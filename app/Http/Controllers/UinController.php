<?php

namespace App\Http\Controllers;

use App\Library\Parser;
use App\Models\Uin;
use Illuminate\Http\Request;

class UinController extends Controller
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
        $model = new Uin();
        $tag = 'uin';
        $insertParseXml = $parser->parseXml($request, $model, $tag);

        return $insertParseXml;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Uin  $uin
     * @return \Illuminate\Http\Response
     */
    public function show(Uin $uin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Uin  $uin
     * @return \Illuminate\Http\Response
     */
    public function edit(Uin $uin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Uin  $uin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Uin $uin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Uin  $uin
     * @return \Illuminate\Http\Response
     */
    public function destroy(Uin $uin)
    {
        //
    }
}
