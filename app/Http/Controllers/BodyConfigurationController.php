<?php

namespace App\Http\Controllers;

use App\Models\BodyConfiguration;
use App\Library\Parser;
use Illuminate\Http\Request;

class BodyConfigurationController extends Controller
{

    public function index()
    {
        return BodyConfiguration::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    static function store(Request $request)
    {
        $parser = new Parser;
        $model = new BodyConfiguration;
        $tag = 'bodyConfiguration';
        $insertParseXml = $parser->parseXml($request, $model, $tag);

        return $insertParseXml;
    }

    /**
     * Display the specified resource.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function show(Request $request)
    {
        $bodyConf = BodyConfiguration::where('model_id', $request->model_id)->where('bodyConfiguration', $request->bodyConfiguration)->first();
        return $bodyConf;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function update(Request $request)
    {
        $update = BodyConfiguration::where('model_id', $request->model_id)->where('bodyConfiguration', $request->bodyConfiguration)->first();
        $update->bodyConfiguration = $request->bodyConfigurationUpdate;
        $update->save();
        return 'Configuration update';
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BodyConfiguration  $bodyConfiguration
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        BodyConfiguration::where('model_id', $request->model_id)->where('bodyConfiguration', $request->bodyConfiguration)->delete();
        return 'Configuration destroy';
    }
}
