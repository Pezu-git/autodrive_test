<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BodyConfiguration extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        "id", "model_id", "bodyConfiguration"
    ];

    public function configurationList()
    {
        return $this->hasMany(Generation::class, 'bodyConf_id');
    }

    public function modificationList()
    {
        return $this->hasMany(Modification::class, 'bodyConf_id');
    }

    public function complectationList()
    {
        return $this->hasMany(Complectation::class, 'bodyConf_id');
    }

    public function models()
    {
        return $this->belongsTo(Models::class);
    }
}
