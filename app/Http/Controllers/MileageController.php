<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mileage;
use App\Library\Parser;

class MileageController extends Controller
{

    public function index()
    {
        return Mileage::all();
    }

    public function store(Request $request)
    {
        $parser = new Parser;
        $model = new Mileage;
        $phpDataArray = $parser->parseXml($request);
        $tableCol = ["mileage", "mileageUnit"];
        $dataArray = array();
        $dataArray1 = array();
        foreach ($phpDataArray['vehicle'] as $index => $data) {

            $newData = $parser->vehicleToStr($data);
            foreach ($tableCol as $key => $value) {
                $dataArray1['data_id'] = $newData['id'];
                $dataArray1[$value] = $newData[$value];
            }
            $dataArray[] = $dataArray1;
        }
        foreach ($dataArray as $key => $value) {
            $fid = $model::where('data_id', $value['data_id'])->first();
            if (!$fid) {
                $model::insert([
                    "data_id" => $value['data_id'],
                    "mileage" => (int)$value['mileage'],
                    "mileageUnit" => $value['mileageUnit'],
                ]);
            }
        }
        return 'ok!';
    }

    public function show(Request $request)
    {
        $mileage = Mileage::where('data_id', $request->data_id)->first();
        return $mileage;
    }

    public function update(Request $request)
    {
        $update = Mileage::where('data_id', $request->data_id)->first();
        $update->mileage = $request->mileageUpdate;
        $update->save();
        return 'Mileage update';
    }

    public function destroy(Request $request)
    {
        Mileage::where('data_id', $request->data_id)->delete();
        return 'Mileage destroy';
    }
}
