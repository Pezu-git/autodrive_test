<?php

namespace App\Http\Controllers;

use App\Models\Price;
use App\Library\Parser;
use Illuminate\Http\Request;

class PriceController extends Controller
{

    public function index()
    {
        return Price::all();
    }

    public function create()
    {
        //
    }

    static function store(Request $request)
    {
        $parser = new Parser;
        $model = new Price;
        $tag = 'price';
        $insertParseXml = $parser->parseXml($request, $model, $tag);

        return $insertParseXml;
    }

    public function show(Request $request)
    {
        $priceList = Price::where('data_id', $request->data_id)->first();
        return $priceList;
    }

    public function update(Request $request, Price $priceList)
    {
        $update = Price::where('data_id', $request->data_id)->first();
        $update->price = $request->price;
        $update->specialOffer = $request->specialOffer;
        $update->specialOfferPreviousPrice = $request->specialOfferPreviousPrice;
        $update->tradeinDiscount = $request->tradeinDiscount;
        $update->creditDiscount = $request->creditDiscount;
        $update->insuranceDiscount = $request->insuranceDiscount;
        $update->maxDiscount = $request->maxDiscount;
        $update->save();
        return 'Price update';
    }


    public function destroy(Request $request)
    {
        Price::where('data_id', $request->data_id)->delete();
        return 'PriceList destroy';
    }
}
