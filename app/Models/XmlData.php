<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class XmlData extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        "id", "dealer_id", "uin", "brand", "model", "generation", "bodyConfiguration", "modification", "category"
    ];

    public function dealerList()
    {
        return $this->belongsTo(Dealer::class, 'dealer_id');
    }

    public function priceList()
    {
        return $this->hasOne(PriceList::class, 'data_id');
    }

    public function engineList()
    {
        return $this->hasOne(Engine::class, 'data_id');
    }

    public function mileageList()
    {
        return $this->hasOne(Mileage::class, 'data_id');
    }

    public function gearboxTypeList()
    {
        return $this->belongsToMany(GearboxType::class)->as('gearboxType');
    }

    public function bodyColorList()
    {
        return $this->belongsToMany(BodyColor::class)->as('bodyColor');
    }
}
