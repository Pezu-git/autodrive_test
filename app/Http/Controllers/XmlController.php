<?php

namespace App\Http\Controllers;

use App\Library\Parser;
use App\Models\XmlData;
use App\Models\GearboxType;
use App\Models\BodyColor;
use Illuminate\Http\Request;

class XmlController extends Controller
{

    public function index()
    {
        return XmlData::all();
    }

    public function store(Request $request)
    {

        // return $this->setGearboxPivot($request);
        $parser = new Parser;
        $model = new XmlData;
        $tag = 'id';
        $tableCol = ["id", "uin", "brand", "model", "generation", "bodyConfiguration", "modification", "category", "dealer"];
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
            foreach ($xmll->vehicle[$i]->dealer as $a => $b) {
                array_push($arr, $b);
            }
        }
        foreach ($insertParseXml as $key => $value) {
            $t = array_search($value['dealer'], $arr);
            $ts = json_decode(json_encode($arr), true);

            $value += ['dealer_id' => $ts[$t]['@attributes']['id']];
            $insertParseXml[$key] += ['dealer_id' => $ts[$t]['@attributes']['id']];
        }

        foreach ($insertParseXml as $key => $value) {
            $model::insert([
                "id" => $value['id'],
                "uin" => $value['uin'],
                "brand" => $value['brand'],
                "model" => $value['model'],
                "generation" => $value['generation'],
                "bodyConfiguration" => $value['bodyConfiguration'],
                "modification" => $value['modification'],
                "category" => $value['category'],
                "dealer_id" => $value['dealer_id'],
            ]);
        }
        return 'ok!';
    }

    public function show(Request $request)
    {
        $car = XmlData::where('id', $request->id)->first();
        return $car;
    }

    public function update(Request $request)
    {
        $car = XmlData::where('id', $request->id)->first();
        return $request;
        // $car->dealer = $request->name;
        // $car->save();
        // return 'dealer update';
    }

    public function destroy(Request $request)
    {
        XmlData::where('id', $request->id)->delete();

        return 'Car destroy';
    }

    public function setGearboxPivot($request)
    {
        $parser = new Parser;
        $tableCol = ["id", "gearboxType", "gearboxGearCount"];
        $insertParseXml = $parser->insertToDb($request, $tableCol);

        foreach ($insertParseXml as $key => $value) {
            $gearBox = GearboxType::where('gearboxType', $value['gearboxType'])->where('gearboxGearCount', $value['gearboxGearCount'])->first();
            $data = XmlData::where('id', $value['id'])->first();

            $data->gearboxTypeList()->attach($gearBox);
        }
        return 'ok!';
    }
    //!
    public function setBodyColorPivot($request)
    {
        $parser = new Parser;
        $tableCol = ["id", "bodyColor", "bodyColorMetallic"];
        $insertParseXml = $parser->insertToDb($request, $tableCol);

        foreach ($insertParseXml as $key => $value) {
            $bodyColor = BodyColor::where('bodyColor', $value['bodyColor'])->where('bodyColorMetallic', $value['bodyColorMetallic'])->first();
            $data = XmlData::where('id', $value['id'])->first();
            $data->bodyColorList()->attach($bodyColor);
        }
        return 'ok';
    }
}
