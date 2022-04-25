<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Engine extends Model
{
    use HasFactory;

    protected $fillable = [
        'id', 'name'
    ];

    public function data()
    {
        return $this->belongsTo(XmlData::class);
    }
}
