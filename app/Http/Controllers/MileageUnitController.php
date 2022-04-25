<?php

namespace App\Http\Controllers;

use App\Library\Parser;
use App\Models\MileageUnit;
use Illuminate\Http\Request;

class MileageUnitController extends Controller
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
        $model = new MileageUnit();
        $tag = 'mileageUnit';
        $insertParseXml = $parser->parseXml($request, $model, $tag);

        return $insertParseXml;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MileageUnit  $mileageUnit
     * @return \Illuminate\Http\Response
     */
    public function show(MileageUnit $mileageUnit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MileageUnit  $mileageUnit
     * @return \Illuminate\Http\Response
     */
    public function edit(MileageUnit $mileageUnit)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MileageUnit  $mileageUnit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MileageUnit $mileageUnit)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MileageUnit  $mileageUnit
     * @return \Illuminate\Http\Response
     */
    public function destroy(MileageUnit $mileageUnit)
    {
        //
    }
}
