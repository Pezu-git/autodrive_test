<?php

namespace App\Http\Controllers;

use App\Models\Dealer;
use App\Models\XmlData;
use Illuminate\Http\Request;
use App\Library\Parser;

class DealerController extends Controller
{

    public function index()
    {
        return Dealer::all();
    }


    public function store(Request $request)
    {
        $parser = new Parser;
        $model = new Dealer;
        $tag = 'dealer';
        $tableCol = ["dealer"];
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

                array_push($arr, $b);
            }
        };

        foreach ($insertParseXml as $key => $value) {
            $t = array_search($value['dealer'], $arr);
            $ts = json_decode(json_encode($arr), true);
            $value += ['id' => $ts[$t]['@attributes']['id']];
            $insertParseXml[$key] += ['id' => $ts[$t]['@attributes']['id']];
        }

        foreach ($insertParseXml as $key => $value) {
            $fid = $model::where('id', $value['id'])->first();
            if (!$fid) {
                $model::insert([
                    "id" => $value['id'],
                    "dealer" => $value['dealer'],
                ]);
            }
        }
        return 'ok!';
    }


    public function show(Request $request)
    {

        $dealer = Dealer::where('dealer', $request->dealer)->first();
        return $dealer->dataList;
    }

    public function update(Request $request)
    {
        $oldDealer = Dealer::where('dealer', $request->dealer)->first();
        $oldDealer->dealer = $request->name;
        $oldDealer->save();
        return 'dealer update';
    }


    public function destroy(Request $request)
    {
        Dealer::where('dealer', $request->dealer)->first()->delete();

        return 'Dealer destroy';
    }
}
