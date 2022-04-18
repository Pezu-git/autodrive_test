<?php

namespace App\Http\Controllers;

use App\Models\Engine;
use App\Library\Parser;
use Illuminate\Http\Request;

class EngineController extends Controller
{

    public function index()
    {
        return Engine::all();
    }

    public function store(Request $request)
    {
        $parser = new Parser;
        $model = new Engine;
        $phpDataArray = $parser->parseXml($request);
        $tableCol = ["engineType", "engineVolume", "enginePower"];
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
                    "engineType" => $value['engineType'],
                    "engineVolume" => (int)$value['engineVolume'],
                    "enginePower" => (int)$value['enginePower'],
                ]);
            }
        }
        return 'ok!';
    }

    public function show(Request $request)
    {
        $engine = Engine::where('data_id', $request->data_id)->where('engineType', $request->engineType)->where('engineVolume', $request->engineVolume)->where('enginePower', $request->enginePower)->first();
        return $engine;
    }


    public function update(Request $request)
    {
        $update = Engine::where('data_id', $request->data_id)->where('engineType', $request->engineType)->where('engineVolume', $request->engineVolume)->where('enginePower', $request->enginePower)->first();
        $update->engineType = $request->engineTypeUpdate;
        $update->engineVolume = $request->engineVolumeUpdate;
        $update->enginePower = $request->enginePowerUpdate;
        $update->save();
        return 'Engine update';
    }

    public function destroy(Request $request)
    {
        Engine::where('data_id', $request->data_id)->where('engineType', $request->engineType)->where('engineVolume', $request->engineVolume)->where('enginePower', $request->enginePower)->delete();
        return 'Engine destroy';
    }
}
