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

    static function store(Request $request)
    {
        $parser = new Parser;
        $model = new Generation;
        $tag = 'generation';
        $insertParseXml = $parser->parseXml($request, $model, $tag);

        return $insertParseXml;
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
