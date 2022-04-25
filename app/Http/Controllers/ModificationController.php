<?php

namespace App\Http\Controllers;

use App\Models\Modification;
use Illuminate\Http\Request;
use App\Library\Parser;

class ModificationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Modification::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    static function store(Request $request)
    {
        $parser = new Parser;
        $model = new Modification;
        $tag = 'modification';
        $insertParseXml = $parser->parseXml($request, $model, $tag);

        return $insertParseXml;
    }

    public function show(Request $request)
    {
        $modification = Modification::where('bodyConf_id', $request->bodyConf_id)->where('modification', $request->modification)->first();
        return $modification;
    }


    public function destroy(Request $request)
    {
        Modification::where('bodyConf_id', $request->bodyConf_id)->where('modification', $request->modification)->delete();
        return 'Modification destroy';
    }
}
