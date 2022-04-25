<?php

namespace App\Http\Controllers;

use App\Models\GearboxType;
use Illuminate\Http\Request;
use App\Library\Parser;

class GearboxTypeController extends Controller
{
    public function index()
    {
        return GearboxType::all();
    }

    static function store(Request $request)
    {
        $parser = new Parser;
        $model = new GearboxType;
        $tag = 'gearboxType';
        $insertParseXml = $parser->parseXml($request, $model, $tag);

        return $insertParseXml;
    }

    public function show(Request $request)
    {
        $gearboxType = GearboxType::where('gearboxType', $request->gearboxType)->where('gearboxGearCount', $request->gearboxGearCount)->first();
        return $gearboxType;
    }

    public function destroy(Request $request)
    {
        GearboxType::where('gearboxType', $request->gearboxType)->where('gearboxGearCount', $request->gearboxGearCount)->delete();
        return 'GearboxType destroy';
    }
}
