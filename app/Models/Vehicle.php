<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    protected $fillable = [
        'registration_number',
        'model',
        'brand',
        'year',
        'vin',
        'engine_capacity',
        'mileage',
        'category_id',
        'fuel_type_id',
        'status_id',
        'body_type_id',
        'user_id',
    ];

    public function bodyType() {
        return $this->belongsTo(BodyType::class, 'body_type_id');
    }

    public function fuelType() {
        return $this->belongsTo(FuelType::class, 'fuel_type_id');
    }

    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function category() {
        return $this->belongsTo(VehicleCategory::class, 'category_id');
    }

    public function status() {
        return $this->belongsTo(VehicleStatus::class, 'status_id');
    }

}
