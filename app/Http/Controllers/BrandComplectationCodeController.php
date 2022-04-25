<?php

namespace App\Http\Controllers;

use App\Library\Parser;
use App\Models\BrandComplectationCode;
use Illuminate\Http\Request;

class BrandComplectationCodeController extends Controller
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
        $model = new BrandComplectationCode();
        $tag = 'brandComplectationCode';
        $insertParseXml = $parser->parseXml($request, $model, $tag);

        return $insertParseXml;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BrandComplectationCode  $brandComplectationCode
     * @return \Illuminate\Http\Response
     */
    public function show(BrandComplectationCode $brandComplectationCode)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BrandComplectationCode  $brandComplectationCode
     * @return \Illuminate\Http\Response
     */
    public function edit(BrandComplectationCode $brandComplectationCode)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BrandComplectationCode  $brandComplectationCode
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BrandComplectationCode $brandComplectationCode)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BrandComplectationCode  $brandComplectationCode
     * @return \Illuminate\Http\Response
     */
    public function destroy(BrandComplectationCode $brandComplectationCode)
    {
        //
    }
}
