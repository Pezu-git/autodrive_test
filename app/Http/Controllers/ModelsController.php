<?php

namespace App\Http\Controllers;

use App\Models\Models;
use App\Library\Parser;
use Illuminate\Http\Request;

class ModelsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Models::all();
    }

    public function store(Request $request)
    {
        $parser = new Parser;
        $model = new Models;
        $tag = 'model';
        $tableCol = ["model", "brand"];
        $insertParseXml = $parser->insertToDb($request, $tableCol);


        if ($request['file'] === '' || $request['file'] === null) {
            $xmlVar = 'data.xml';
        } else {
            $xmlVar  = $request['file'] . '.xml';
        }
        $xmlDataString = file_get_contents(public_path($xmlVar));
        $xmll = simplexml_load_string($xmlDataString);
        $arr = [];

        for ($i = 0; $i < count($xmll->vehicle); $i++) {

            foreach ($xmll->vehicle[$i]->$tag as $a => $b) {
                $brandVal = $xmll->vehicle[$i]->brand;
                array_push($arr, [$b, $brandVal]);
            }
        }

        foreach ($insertParseXml as $key => $value) {

            $ts = json_decode(json_encode($arr), true);
            $insertParseXml[$key] += ['id' => $ts[$key][0]['@attributes']['id']];
            $insertParseXml[$key] += ['brand_id' => $ts[$key][1]['@attributes']['id']];
        }
        foreach ($insertParseXml as $key => $value) {
            $fid = $model::where('id', $value['id'])->first();
            if (!$fid) {
                $model::insert([
                    "id" => $value['id'],
                    "brand_id" => $value['brand_id'],
                    "model" => $value['model'],
                ]);
            }
        }
        return 'ok!';
    }

    public function show(Request $request)
    {
        $model = Models::where('model', $request->model)->first();
        return $model;
    }

    public function update(Request $request)
    {
        $update = Models::where('model', $request->model)->first();
        $update->model = $request->modelUpdate;
        $update->save();
        return 'Model update';
    }

    public function destroy(Request $request)
    {
        Models::where('model', $request->model)->delete();
        return 'Model destroy';
    }
}
