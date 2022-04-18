<?php

namespace App\Http\Controllers;

use App\Models\BodyColor;
use App\Library\Parser;
use Illuminate\Http\Request;

class BodyColorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return BodyColor::all();
    }

    public function store(Request $request)
    {
        $parser = new Parser;
        $model = new BodyColor;
        $phpDataArray = $parser->parseXml($request);
        $tableCol = ["bodyColor", "bodyColorMetallic"];
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
            $fid = $model::where('bodyColor', $value['bodyColor'])->where('bodyColorMetallic', $value['bodyColorMetallic'])->first();
            if (!$fid) {
                $model::insert([
                    "bodyColor" => $value['bodyColor'],
                    "bodyColorMetallic" => (int)$value['bodyColorMetallic'],
                ]);
            }
        }
        return 'ok!';
    }

    public function destroy(Request $request)
    {
        BodyColor::where('bodyType', $request->bodyColor)->where('bodyColorMetallic', $request->bodyColorMetallic)->delete();
        return 'BodyColor destroy';
    }
}
