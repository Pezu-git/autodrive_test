<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;

    public $timestamps = false;


    protected $fillable = [
        'id', 'name'
    ];

    public function modelList()
    {
        return $this->hasMany(Models::class, 'brand_id');
    }
}
