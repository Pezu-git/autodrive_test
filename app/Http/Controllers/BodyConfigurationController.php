<?php

namespace App\Http\Controllers;

use App\Models\BodyConfiguration;
use App\Library\Parser;
use Illuminate\Http\Request;

class BodyConfigurationController extends Controller
{

    public function index()
    {
        return BodyConfiguration::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function store(Request $request)
    {
        $parser = new Parser;
        $model = new BodyConfiguration;
        $tag = 'bodyConfiguration';
        $tableCol = ["bodyConfiguration", "model"];
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
                $modelVal = $xmll->vehicle[$i]->model;
                array_push($arr, [$b, $modelVal]);
            }
        }

        foreach ($insertParseXml as $key => $value) {
            if ($insertParseXml[$key][$tag] === '') {
                unset($insertParseXml[$key]);
            }
            $ts = json_decode(json_encode($arr), true);
            if (array_key_exists('@attributes', $ts[$key][0])) {
                $insertParseXml[$key] += ['id' => $ts[$key][0]['@attributes']['id']];
                $insertParseXml[$key] += ['model_id' => $ts[$key][1]['@attributes']['id']];
            }
        }
        foreach ($insertParseXml as $key => $value) {
            $fid = $model::where('id', $value['id'])->first();
            if (!$fid) {
                $model::insert([
                    "id" => $value['id'],
                    "model_id" => $value['model_id'],
                    "bodyConfiguration" => $value['bodyConfiguration'],
                ]);
            }
        }
        return 'ok!';
    }

    /**
     * Display the specified resource.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function show(Request $request)
    {
        $bodyConf = BodyConfiguration::where('model_id', $request->model_id)->where('bodyConfiguration', $request->bodyConfiguration)->first();
        return $bodyConf;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function update(Request $request)
    {
        $update = BodyConfiguration::where('model_id', $request->model_id)->where('bodyConfiguration', $request->bodyConfiguration)->first();
        $update->bodyConfiguration = $request->bodyConfigurationUpdate;
        $update->save();
        return 'Configuration update';
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BodyConfiguration  $bodyConfiguration
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        BodyConfiguration::where('model_id', $request->model_id)->where('bodyConfiguration', $request->bodyConfiguration)->delete();
        return 'Configuration destroy';
    }
}
