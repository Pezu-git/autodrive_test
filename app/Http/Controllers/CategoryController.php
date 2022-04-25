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

    static function store(Request $request)
    {
        $parser = new Parser;
        $model = new Category;
        $tag = 'category';
        $insertParseXml = $parser->parseXml($request, $model, $tag);

        return $insertParseXml;
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
