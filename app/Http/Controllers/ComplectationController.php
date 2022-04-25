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

    static function store(Request $request)
    {
        $parser = new Parser;
        $model = new Complectation;
        $tag = 'complectation';
        $insertParseXml = $parser->parseXml($request, $model, $tag);

        return $insertParseXml;
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
