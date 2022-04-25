<?php

namespace App\Http\Controllers;

use App\Library\Parser;
use App\Models\SteeringWheel;
use Illuminate\Http\Request;

class SteeringWheelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    static function store(Request $request)
    {
        $parser = new Parser;
        $model = new SteeringWheel();
        $tag = 'steeringWheel';
        $insertParseXml = $parser->parseXml($request, $model, $tag);

        return $insertParseXml;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SteeringWheel  $steeringWheel
     * @return \Illuminate\Http\Response
     */
    public function show(SteeringWheel $steeringWheel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SteeringWheel  $steeringWheel
     * @return \Illuminate\Http\Response
     */
    public function edit(SteeringWheel $steeringWheel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SteeringWheel  $steeringWheel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SteeringWheel $steeringWheel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SteeringWheel  $steeringWheel
     * @return \Illuminate\Http\Response
     */
    public function destroy(SteeringWheel $steeringWheel)
    {
        //
    }
}
