<?php

namespace App\Http\Controllers;

use App\Models\Complectation;
use Illuminate\Http\Request;
use App\Library\Parser;

class ComplectationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Complectation::all();
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $parser = new Parser;
        $model = new Complectation;
        $tag = 'complectation';
        $tableCol = ["complectation", "bodyConfiguration"];
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
                        "complectation" => $value['complectation'],
                    ]);
                }
            }
        }
        return 'ok!';
    }

    public function show(Request $request)
    {
        $complectation = Complectation::where('bodyConf_id', $request->bodyConf_id)->where('complectation', $request->complectation)->first();
        return $complectation;
    }


    public function destroy(Request $request)
    {
        Complectation::where('bodyConf_id', $request->bodyConf_id)->where('complectation', $request->complectation)->delete();
        return 'Complectation destroy';
    }
}
