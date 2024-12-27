<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FuelType extends Model
{
    public $timestamps = false;
    
    protected $fillable = [
        'name',
    ];

    public function vehicle() {
        return $this->hasMany(Vehicle::class, 'fuel_type_id');
    }
}
