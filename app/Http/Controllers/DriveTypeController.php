<?php

namespace App\Http\Controllers;

use App\Models\DriveType;
use App\Library\Parser;
use Illuminate\Http\Request;

class DriveTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return DriveType::all();
    }

    static function store(Request $request)
    {
        $parser = new Parser;
        $model = new DriveType;
        $tag = 'driveType';
        $insertParseXml = $parser->parseXml($request, $model, $tag);

        return $insertParseXml;
    }

    public function show(Request $request)
    {
        $driveType = DriveType::where('driveType', $request->driveType)->first();
        return $driveType;
    }

    public function destroy(Request $request)
    {
        DriveType::where('driveType', $request->driveType)->delete();
        return 'DriveType destroy';
    }
}
