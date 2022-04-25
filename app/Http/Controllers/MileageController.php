<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mileage;
use App\Library\Parser;

class MileageController extends Controller
{

    public function index()
    {
        return Mileage::all();
    }

    static function store(Request $request)
    {
        $parser = new Parser;
        $model = new Mileage;
        $tag = 'mileage';
        $insertParseXml = $parser->parseXml($request, $model, $tag);

        return $insertParseXml;
    }

    public function show(Request $request)
    {
        $mileage = Mileage::where('data_id', $request->data_id)->first();
        return $mileage;
    }

    public function update(Request $request)
    {
        $update = Mileage::where('data_id', $request->data_id)->first();
        $update->mileage = $request->mileageUpdate;
        $update->save();
        return 'Mileage update';
    }

    public function destroy(Request $request)
    {
        Mileage::where('data_id', $request->data_id)->delete();
        return 'Mileage destroy';
    }
}
