<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VehicleStatus extends Model
{
    public $timestamps = false;
    
    protected $fillable = [
        'name',
    ];

    public function vehicle() {
        return $this->hasMany(Vehicle::class, 'status_id');
    }
}
