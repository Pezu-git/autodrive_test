<?php

namespace App\Http\Controllers;

use App\Models\Generation;
use Illuminate\Http\Request;
use App\Library\Parser;

class GenerationController extends Controller
{
    public function index()
    {
        return Generation::all();
    }

    public function store(Request $request)
    {
        $parser = new Parser;
        $model = new Generation;
        $tag = 'generation';
        $tableCol = ["generation", "bodyConfiguration"];
        $insertParseXml = $parser->insertToDb($request, $tableCol, $model, $tag);


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
                $bodyConfVal = $xmll->vehicle[$i]->bodyConfiguration;
                array_push($arr, [$b, $bodyConfVal]);
            }
        }
        foreach ($insertParseXml as $key => $value) {

            $ts = json_decode(json_encode($arr), true);
            if (array_key_exists('@attributes', $ts[$key][0])) {
                $insertParseXml[$key] += ['id' => $ts[$key][0]['@attributes']['id']];
                $insertParseXml[$key] += ['bodyConf_id' => $ts[$key][1]['@attributes']['id']];
            }
        }
        foreach ($insertParseXml as $key => $value) {
            if (array_key_exists('id', $value)) {
                $fid = $model::where('id', $value['id'])->first();
                if (!$fid) {
                    $model::insert([
                        "id" => $value['id'],
                        "bodyConf_id" => $value['bodyConf_id'],
                        "generation" => $value['generation'],
                    ]);
                }
            }
        }
        return 'ok!';
    }


    public function show(Request $request)
    {
        $generation = Generation::where('bodyConf_id', $request->bodyConf_id)->where('generation', $request->generation)->first();
        return $generation;
    }

    public function update(Request $request)
    {
        $update = Generation::where('bodyConf_id', $request->bodyConf_id)->where('generation', $request->generation)->first();
        $update->generation = $request->generationUpdate;
        $update->save();
        return 'Generation update';
    }

    public function destroy(Request $request)
    {
        Generation::where('bodyConf_id', $request->bodyConf_id)->where('generation', $request->generation)->delete();
        return 'Generation destroy';
    }
}
