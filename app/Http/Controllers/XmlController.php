<?php

namespace App\Http\Controllers;

use App\Library\Parser;
use App\Models\XmlData;
use App\Models\GearboxType;
use App\Models\BodyColor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class XmlController extends Controller
{

    public function index()
    {
        return XmlData::all();
    }

    static function store(Request $request)
    {
        $model = new XmlData;
        if ($request['file'] === '' || $request['file'] === null) {
            $xmlVar = 'data.xml';
        } else {
            $xmlVar  = $request['file'] . '.xml';
        }
        $xmlDataString = file_get_contents(public_path($xmlVar));
        $phpDataArray = json_decode(json_encode((array) simplexml_load_string($xmlDataString, null, LIBXML_NOCDATA)), true);
        $arr = [];
        foreach ($phpDataArray['vehicle'] as $index => $data) {
            foreach ($data as $key => $value) {
                $id = $data['id'];
                $arr['id'] = $id;
                $arr[$key] = $data[$key];
                if ($data[$key] === []) {
                    $data[$key] = null;
                    $arr[$key] = null;
                }
            }
            $arr1 = [];
            foreach ($arr as $key => $value) {
                $arr1['id'] = $id;
                if ($key !== 'id') {
                    $result = mb_strtolower(preg_replace('/\B([A-Z])/', '_$1', $key) . 's');
                    try {
                        $f = DB::table($result)->where('name', $arr[$key])->first()->id;
                        $arr1[$key] = $f;
                    } catch (\Exception $e) {
                        $arr1[$key] = null;
                    }
                    if (substr($key, -1) === 'y') {
                        try {
                            $str = substr_replace($key, 'ies', -1);
                            $f = DB::table($str)->where('name', $arr[$key])->first()->id;
                            $arr1[$key] = $f;
                        } catch (\Exception $e) {
                            $arr1[$key] = null;
                        }
                    }
                }
                $desc = DB::table('descriptions')->where('car_id', $id)->first()->id;
                $arr1['description'] = $desc;
                if (array_key_exists('equipment', $data)) {
                    $equipmentArr = [];
                    foreach ($data['equipment']['group'] as $key => $value) {
                        if (gettype($value) === 'array' && array_key_exists('@attributes', $value)) {
                            $equipmentArr[] = $value['@attributes']['id'];
                        }
                    }
                    $arr1['equipment'] = json_encode($equipmentArr);
                } else {
                    $arr1['equipment'] = null;
                }
            }
            foreach ($arr1 as $key => $value) {
                $fid = $model::where('id', $arr1['id'])->first();
                if (!$fid) {
                    $model::insert($arr1);
                    $model->equipment = $arr1['equipment'];
                }
            };
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
        $car->dealer_id = $request->dealer_id;
        $car->uin = $request->uin;
        $car->category = $request->category;
        $car->brand = $request->brand;
        $car->model = $request->model;
        $car->generation = $request->generation;
        $car->bodyConfiguration = $request->bodyConfiguration;
        $car->modification = $request->modification;
        $car->save();
        return 'Car update';
    }

    public function destroy(Request $request)
    {
        XmlData::where('id', $request->id)->delete();
        return 'Car destroy';
    }

    // public function setGearboxPivot($request)
    // {
    //     $parser = new Parser;
    //     $tableCol = ["id", "gearboxType", "gearboxGearCount"];
    //     $insertParseXml = $parser->insertToDb($request, $tableCol);

    //     foreach ($insertParseXml as $key => $value) {
    //         $gearBox = GearboxType::where('gearboxType', $value['gearboxType'])->where('gearboxGearCount', $value['gearboxGearCount'])->first();
    //         $data = XmlData::where('id', $value['id'])->first();

    //         $data->gearboxTypeList()->attach($gearBox);
    //     }
    //     return 'ok!';
    // }
    // //!
    // public function setBodyColorPivot($request)
    // {
    //     $parser = new Parser;
    //     $tableCol = ["id", "bodyColor", "bodyColorMetallic"];
    //     $insertParseXml = $parser->insertToDb($request, $tableCol);

    //     foreach ($insertParseXml as $key => $value) {
    //         $bodyColor = BodyColor::where('bodyColor', $value['bodyColor'])->where('bodyColorMetallic', $value['bodyColorMetallic'])->first();
    //         $data = XmlData::where('id', $value['id'])->first();
    //         $data->bodyColorList()->attach($bodyColor);
    //     }
    //     return 'ok';
    // }
}
