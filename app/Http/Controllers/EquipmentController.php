<?php

namespace App\Http\Controllers;

use App\Library\Parser;
use App\Models\Equipment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EquipmentController extends Controller
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
        $model = new Equipment;
        $tag = 'equipment';
        if ($request['file'] === '' || $request['file'] === null) {
            $xmlVar = 'data.xml';
        } else {
            $xmlVar  = $request['file'] . '.xml';
        }
        $xmlDataString = file_get_contents(public_path($xmlVar));
        $xmll = simplexml_load_string($xmlDataString);
        $arr = [];
        for ($i = 0; $i < count($xmll->vehicle); $i++) {;
            foreach ($xmll->vehicle[$i]->$tag as $a => $b) {
                $arr[$a] = $b;;
            }
            $ts = json_decode(json_encode($arr), true);
            foreach ($ts as $key => $value) {

                foreach ($value['group'] as $key => $values) {
                    if (gettype($values) === 'array') {

                        if (array_key_exists('@attributes', $values)) {
                            $id = $values['@attributes']['id'];
                            $name = $values['@attributes']['name'];
                            $f = DB::table('equipments')->find($id);
                            if (!$f) {
                                DB::table('equipments')->insert([
                                    "id" => $id,
                                    "name" => $name,
                                ]);
                            }
                        }
                    }
                };
            }
        }
        return 'ok';
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Equipment  $equipment
     * @return \Illuminate\Http\Response
     */
    public function show(Equipment $equipment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Equipment  $equipment
     * @return \Illuminate\Http\Response
     */
    public function edit(Equipment $equipment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Equipment  $equipment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Equipment $equipment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Equipment  $equipment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Equipment $equipment)
    {
        //
    }
}
