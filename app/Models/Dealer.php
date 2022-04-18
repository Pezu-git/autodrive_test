<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dealer extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        "id", "dealer"
    ];

    public function dataList()
    {
        return $this->hasMany(XmlData::class, 'dealer_id');
    }
}
