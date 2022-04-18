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

    public function store(Request $request)
    {
        $parser = new Parser;
        $model = new DriveType;
        $tableCol = ["driveType"];
        $insertParseXml = $parser->insertToDb($request, $tableCol);

        foreach ($insertParseXml as $key => $value) {
            $fid = $model::where('driveType', $value['driveType'])->first();

            if (!$fid) {
                $model::insert([
                    "driveType" => $value['driveType'],
                ]);
            }
        }
        return 'ok!';
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
