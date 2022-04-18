<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Library\Parser;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        return Category::all();
    }

    public function store(Request $request)
    {
        $parser = new Parser;
        $model = new Category;
        $tag = 'category';
        $tableCol = ["category", "subcategory"];
        $insertParseXml = $parser->insertToDb($request, $tableCol);

        if ($request['file'] === '' || $request['file'] === null) {
            $xmlVar = 'data.xml';
        } else {
            $xmlVar  = $request['file'] . '.xml';
        }
        $xmlDataString = file_get_contents(public_path($xmlVar));
        $xmll = simplexml_load_string($xmlDataString);
        $arr = [];
        for ($i = 0; $i < count($xmll->vehicle); $i++) {
            foreach ($xmll->vehicle[$i]->$tag as $a => $b) {

                array_push($arr, $b);
            }
        }
        foreach ($insertParseXml as $key => $value) {
            $t = array_search($value['category'], $arr);
            $ts = json_decode(json_encode($arr), true);
            $insertParseXml[$key] += ['id' => $ts[$t]['@attributes']['id']];
        }

        foreach ($insertParseXml as $key => $value) {
            $fid = $model::where('id', $value['id'])->where('subcategory', $value['subcategory'])->first();

            if (!$fid) {
                $model::insert([
                    "id" => $value['id'],
                    "category" => $value['category'],
                    "subcategory" => $value['subcategory'],
                ]);
            }
        }
        return 'ok!';
    }

    public function show(Request $request)
    {
        $category = Category::where('category', $request->category)->where('subcategory', $request->subcategory)->first();
        return $category;
    }

    public function update(Request $request)
    {
        $update = Category::where('category', $request->category)->where('subcategory', $request->subcategory)->first();
        $update->category = $request->categoryUpdate;
        $update->subcategory = $request->subcategoryUpdate;
        $update->save();
        return 'Category update';
    }

    public function destroy(Request $request)
    {
        Category::where('category', $request->category)->where('subcategory', $request->subcategory)->delete();
        return 'Category destroy';
    }
}
