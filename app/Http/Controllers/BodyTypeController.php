<?php

namespace App\Http\Controllers;

use App\Models\BodyType;
use App\Library\Parser;
use Illuminate\Http\Request;

class BodyTypeController extends Controller
{

    public function index()
    {
        return BodyType::all();
    }

    public function store(Request $request)
    {
        $parser = new Parser;
        $model = new BodyType;
        $tableCol = ["bodyType", "bodyDoorCount"];
        $insertParseXml = $parser->insertToDb($request, $tableCol);

        foreach ($insertParseXml as $key => $value) {
            $fid = $model::where('bodyType', $value['bodyType'])->first();
            if (!$fid) {
                $model::insert([
                    "bodyType" => $value['bodyType'],
                    "bodyDoorCount" => $value['bodyDoorCount'],
                ]);
            }
        }
        return 'ok!';
    }

    public function show(Request $request)
    {
        $bodyType = BodyType::where('bodyType', $request->bodyType)->first();
        return $bodyType;
    }

    public function update(Request $request)
    {
        $update = BodyType::where('bodyType', $request->bodyType)->first();
        $update->bodyType = $request->bodyTypeUpdate;
        $update->save();
        return 'BodyType update';
    }

    public function destroy(Request $request)
    {
        BodyType::where('bodyType', $request->bodyType)->delete();
        return 'BodyType destroy';
    }
}
