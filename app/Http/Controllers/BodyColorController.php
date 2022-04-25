<?php

namespace App\Http\Controllers;

use App\Models\BodyColor;
use App\Library\Parser;
use Illuminate\Http\Request;

class BodyColorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    static function index()
    {
        return BodyColor::all();
    }

    static function store(Request $request)
    {
        $parser = new Parser;
        $model = new BodyColor;
        $tag = 'bodyColor';
        $insertParseXml = $parser->parseXml($request, $model, $tag);

        return $insertParseXml;
    }

    public function destroy(Request $request)
    {
        BodyColor::where('bodyType', $request->bodyColor)->where('bodyColorMetallic', $request->bodyColorMetallic)->delete();
        return 'BodyColor destroy';
    }
}
