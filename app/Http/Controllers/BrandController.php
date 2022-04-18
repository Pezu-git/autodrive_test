<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;
use App\Library\Parser;

class BrandController extends Controller
{

    public function index()
    {
        return Brand::all();
    }


    public function store(Request $request)
    {
        $parser = new Parser;
        $model = new Brand;
        $tag = 'brand';
        $tableCol = ["brand"];
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
        }
        foreach ($insertParseXml as $key => $value) {
            $t = array_search($value['brand'], $arr);
            $ts = json_decode(json_encode($arr), true);
            $insertParseXml[$key] += ['id' => $ts[$t]['@attributes']['id']];
        }

        foreach ($insertParseXml as $key => $value) {
            $fid = $model::where('id', $value['id'])->first();
            if (!$fid) {
                $model::insert([
                    "id" => $value['id'],
                    "brand" => $value['brand'],
                ]);
            }
        }
        return 'ok';
    }


    public function show(Request $request)
    {
        $brand = Brand::where('id', $request->brand)->first();
        return $brand;
    }

    public function update(Request $request)
    {
        $update = Brand::where('dealer', $request->brand)->first();
        $update->brand = $request->name;
        $update->save();
        return 'Brand update';
    }

    public function destroy(Request $request)
    {
        Brand::where('brand', $request->brand)->delete();

        return 'Brand destroy';
    }
}
