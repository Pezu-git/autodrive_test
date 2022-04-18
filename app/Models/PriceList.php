<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PriceList extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = [
        "data_id", "price", "specialOffer", "specialOfferPreviousPrice", "tradeinDiscount", "creditDiscount", "insuranceDiscount", "maxDiscount"
    ];

    public function data()
    {
        return $this->belongsTo(XmlData::class);
    }
}
