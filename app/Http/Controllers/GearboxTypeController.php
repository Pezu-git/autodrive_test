<?php

namespace App\Http\Controllers;

use App\Models\GearboxType;
use Illuminate\Http\Request;
use App\Library\Parser;

class GearboxTypeController extends Controller
{
    public function index()
    {
        return GearboxType::all();
    }

    public function store(Request $request)
    {
        $parser = new Parser;
        $model = new GearboxType;
        $phpDataArray = $parser->parseXml($request);
        $tableCol = ["gearboxType", "gearboxGearCount"];
        $dataArray = array();
        $dataArray1 = array();
        foreach ($phpDataArray['vehicle'] as $index => $data) {

            $newData = $parser->vehicleToStr($data);
            foreach ($tableCol as $key => $value) {
                $dataArray1[$value] = $newData[$value];
            }
            $dataArray[] = $dataArray1;
        }
        foreach ($dataArray as $key => $value) {
            $fid = $model::where('gearboxType', $value['gearboxType'])->where('gearboxGearCount', $value['gearboxGearCount'])->first();
            if (!$fid) {
                $model::insert([
                    "gearboxType" => $value['gearboxType'],
                    "gearboxGearCount" => $value['gearboxGearCount'],
                ]);
            }
        }
        return 'ok!';
    }

    public function show(Request $request)
    {
        $gearboxType = GearboxType::where('gearboxType', $request->gearboxType)->where('gearboxGearCount', $request->gearboxGearCount)->first();
        return $gearboxType;
    }

    public function destroy(Request $request)
    {
        GearboxType::where('gearboxType', $request->gearboxType)->where('gearboxGearCount', $request->gearboxGearCount)->delete();
        return 'GearboxType destroy';
    }
}
