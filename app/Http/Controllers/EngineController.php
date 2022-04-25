<?php

namespace App\Http\Controllers;

use App\Models\Engine;
use App\Library\Parser;
use Illuminate\Http\Request;

class EngineController extends Controller
{

    public function index()
    {
        return Engine::all();
    }

    static function store(Request $request)
    {
        $parser = new Parser;
        $model = new Engine;
        $tag = 'engineType';
        $insertParseXml = $parser->parseXml($request, $model, $tag);

        return $insertParseXml;
    }

    public function show(Request $request)
    {
        $engine = Engine::where('data_id', $request->data_id)->where('engineType', $request->engineType)->where('engineVolume', $request->engineVolume)->where('enginePower', $request->enginePower)->first();
        return $engine;
    }


    public function update(Request $request)
    {
        $update = Engine::where('data_id', $request->data_id)->where('engineType', $request->engineType)->where('engineVolume', $request->engineVolume)->where('enginePower', $request->enginePower)->first();
        $update->engineType = $request->engineTypeUpdate;
        $update->engineVolume = $request->engineVolumeUpdate;
        $update->enginePower = $request->enginePowerUpdate;
        $update->save();
        return 'Engine update';
    }

    public function destroy(Request $request)
    {
        Engine::where('data_id', $request->data_id)->where('engineType', $request->engineType)->where('engineVolume', $request->engineVolume)->where('enginePower', $request->enginePower)->delete();
        return 'Engine destroy';
    }
}
