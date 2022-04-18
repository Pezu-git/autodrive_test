<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Models extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'id', "brand_id", "model"
    ];

    public function brands()
    {
        return $this->belongsTo(XmlData::class);
    }

    public function configurationList()
    {
        return $this->hasMany(BodyConfiguration::class, 'model_id');
    }
}
