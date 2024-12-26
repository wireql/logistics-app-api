<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VehicleCategory extends Model
{
    public $timestamps = false;
    
    protected $fillable = [
        'name',
    ];
}
