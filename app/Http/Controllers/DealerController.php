<?php

namespace App\Http\Controllers;

use App\Models\Dealer;
use App\Models\XmlData;
use Illuminate\Http\Request;
use App\Library\Parser;

class DealerController extends Controller
{

    public function index()
    {
        return Dealer::all();
    }


    static function store(Request $request)
    {
        $parser = new Parser;
        $model = new Dealer;
        $tag = 'dealer';
        $insertParseXml = $parser->parseXml($request, $model, $tag);

        return $insertParseXml;
    }


    public function show(Request $request)
    {

        $dealer = Dealer::where('dealer', $request->dealer)->first();
        return $dealer->dataList;
    }

    public function update(Request $request)
    {
        $oldDealer = Dealer::where('dealer', $request->dealer)->first();
        $oldDealer->dealer = $request->name;
        $oldDealer->save();
        return 'dealer update';
    }


    public function destroy(Request $request)
    {
        Dealer::where('dealer', $request->dealer)->first()->delete();

        return 'Dealer destroy';
    }
}
