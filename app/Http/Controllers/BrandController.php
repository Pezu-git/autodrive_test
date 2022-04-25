<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;
use App\Library\Parser;

class BrandController extends Controller
{

    public function index()
    {
        return Brand::all();
    }


    static function store(Request $request)
    {
        $parser = new Parser;
        $model = new Brand;
        $tag = 'brand';
        $insertParseXml = $parser->parseXml($request, $model, $tag);

        return $insertParseXml;
    }

    public function show(Request $request)
    {
        $brand = Brand::where('brand', $request->brand)->first();
        return $brand;
    }

    public function update(Request $request)
    {
        $update = Brand::where('brand', $request->brand)->first();
        $update->brand = $request->name;
        $update->save();
        return 'Brand update';
    }

    public function destroy(Request $request)
    {
        Brand::where('brand', $request->brand)->delete();

        return 'Brand destroy';
    }
}
