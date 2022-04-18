<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mileage extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'data_id', "mileage", "mileageUnit"
    ];

    public function data()
    {
        return $this->belongsTo(XmlData::class);
    }
}
