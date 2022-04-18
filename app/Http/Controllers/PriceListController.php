<?php

namespace App\Http\Controllers;

use App\Models\PriceList;
use App\Library\Parser;
use Illuminate\Http\Request;

class PriceListController extends Controller
{

    public function index()
    {
        return PriceList::all();
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $parser = new Parser;
        $model = new PriceList;
        $phpDataArray = $parser->parseXml($request);
        $tableCol = ["price", "specialOffer", "specialOfferPreviousPrice", "tradeinDiscount", "creditDiscount", "insuranceDiscount", "maxDiscount"];
        $dataArray = array();
        $dataArray1 = array();
        foreach ($phpDataArray['vehicle'] as $index => $data) {
            $newData = $parser->vehicleToStr($data);
            foreach ($tableCol as $key => $value) {
                $dataArray1['data_id'] = $newData['id'];
                $dataArray1[$value] = $newData[$value];
            }
            $dataArray[] = $dataArray1;
        }
        $model::insert($dataArray);
        return 'ok!';
    }

    public function show(Request $request)
    {
        $priceList = PriceList::where('data_id', $request->data_id)->first();
        return $priceList;
    }

    public function update(Request $request, PriceList $priceList)
    {
        $update = PriceList::where('data_id', $request->data_id)->first();
        $update->price = $request->price;
        $update->specialOffer = $request->specialOffer;
        $update->specialOfferPreviousPrice = $request->specialOfferPreviousPrice;
        $update->tradeinDiscount = $request->tradeinDiscount;
        $update->creditDiscount = $request->creditDiscount;
        $update->insuranceDiscount = $request->insuranceDiscount;
        $update->maxDiscount = $request->maxDiscount;
        $update->save();
        return 'PriceList update';
    }


    public function destroy(Request $request)
    {
        PriceList::where('data_id', $request->data_id)->delete();
        return 'PriceList destroy';
    }
}
