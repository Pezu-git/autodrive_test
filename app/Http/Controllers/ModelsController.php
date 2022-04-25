<?php

namespace App\Http\Controllers;

use App\Models\Models;
use App\Library\Parser;
use Illuminate\Http\Request;

class ModelsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Models::all();
    }

    static function store(Request $request)
    {
        $parser = new Parser;
        $model = new Models;
        $tag = 'model';
        $insertParseXml = $parser->parseXml($request, $model, $tag);

        return $insertParseXml;
    }

    public function show(Request $request)
    {
        $model = Models::where('model', $request->model)->first();
        return $model;
    }

    public function update(Request $request)
    {
        $update = Models::where('model', $request->model)->first();
        $update->model = $request->modelUpdate;
        $update->save();
        return 'Model update';
    }

    public function destroy(Request $request)
    {
        Models::where('model', $request->model)->delete();
        return 'Model destroy';
    }
}
