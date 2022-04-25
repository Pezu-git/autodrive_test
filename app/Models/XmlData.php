<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class XmlData extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'equipment', 'id', 'dealer', 'vin', 'uin', 'category', 'subcategory', 'type',  'year', 'brand',    'model',    'generation',    'bodyConfiguration', 'modification', 'complectation', 'brandComplectationCode',    'engineType',    'engineVolume',    'enginePower',    'bodyNumber',    'bodyType',    'bodyDoorCount',    'bodyColor', 'bodyColorMetallic',    'driveType',    'gearboxType',    'gearboxGearCount',    'steeringWheel',    'mileage',    'mileageUnit',    'price',    'specialOffer',    'specialOfferPreviousPrice',    'tradeinDiscount',    'creditDiscount',    'insuranceDiscount',    'maxDiscount',    'availability',    'ptsType',    'country',    'operatingTime',    'ecoClass',    'driveWheel',    'axisCount',    'brakeType', 'cabinType',    'maximumPermittedMass',    'saddleHeight',    'cabinSuspension',    'chassisSuspension',    'length',    'width',    'bodyVolume',    'bucketVolume',    'tractionClass',    'refrigeratorClass',    'craneArrowRadius',    'craneArrowLength',    'craneArrowPayload', 'loadHeight',    'photoCount',    'description',    'ownersCount',    'vehicleCondition',    'equipment', 'brandColorCode',    'brandInteriorCode',    'certificationProgram',    'promoFeatures',    'acquisitionSource',    'acquisitionDate',    'manufactureDate'
    ];

    protected $casts = [
        'equipment' => 'array',
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
