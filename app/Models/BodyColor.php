<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BodyColor extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        "bodyColor", "bodyColorMetallic"
    ];

    public function dataList()
    {
        return $this->belongsToMany(XmlData::class)->as('dataList');
    }
}
