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

    static function store(Request $request)
    {
        $parser = new Parser;
        $model = new BodyType;
        $tag = 'bodyType';
        $insertParseXml = $parser->parseXml($request, $model, $tag);

        return $insertParseXml;
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
