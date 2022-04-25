<?php

namespace App\Http\Controllers;

use App\Library\Parser;
use App\Models\EnginePower;
use Illuminate\Http\Request;

class EnginePowerController extends Controller
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
        $model = new EnginePower();
        $tag = 'enginePower';
        $insertParseXml = $parser->parseXml($request, $model, $tag);

        return $insertParseXml;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\EnginePower  $enginePower
     * @return \Illuminate\Http\Response
     */
    public function show(EnginePower $enginePower)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\EnginePower  $enginePower
     * @return \Illuminate\Http\Response
     */
    public function edit(EnginePower $enginePower)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\EnginePower  $enginePower
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, EnginePower $enginePower)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\EnginePower  $enginePower
     * @return \Illuminate\Http\Response
     */
    public function destroy(EnginePower $enginePower)
    {
        //
    }
}
