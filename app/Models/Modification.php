<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Modification extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'id', "bodyConf_id", "modification"
    ];

    public function configurationList()
    {
        return $this->belongsTo(BodyConfiguration::class);
    }
}
