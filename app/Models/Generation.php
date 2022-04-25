<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Generation extends Model
{
    use HasFactory;

    protected $fillable = [
        'id', 'name'
    ];

    public function configurationList()
    {
        return $this->belongsTo(BodyConfiguration::class);
    }
}
