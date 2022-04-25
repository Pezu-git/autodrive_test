<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mileage extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'id', 'name'
    ];

    public function data()
    {
        return $this->belongsTo(XmlData::class);
    }
}
