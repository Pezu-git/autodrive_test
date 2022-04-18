<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GearboxType extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        "gearboxType", "gearboxGearCount"
    ];

    public function dataList()
    {
        return $this->belongsToMany(XmlData::class)->as('dataList');
    }
}