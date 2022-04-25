<?php

namespace App\Http\Controllers;

use App\Library\Parser;
use App\Models\BodyNumber;
use Illuminate\Http\Request;

class BodyNumberController extends Controller
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
        $model = new BodyNumber();
        $tag = 'bodyNumber';
        $insertParseXml = $parser->parseXml($request, $model, $tag);

        return $insertParseXml;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BodyNumber  $bodyNumber
     * @return \Illuminate\Http\Response
     */
    public function show(BodyNumber $bodyNumber)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BodyNumber  $bodyNumber
     * @return \Illuminate\Http\Response
     */
    public function edit(BodyNumber $bodyNumber)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BodyNumber  $bodyNumber
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BodyNumber $bodyNumber)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BodyNumber  $bodyNumber
     * @return \Illuminate\Http\Response
     */
    public function destroy(BodyNumber $bodyNumber)
    {
        //
    }
}
