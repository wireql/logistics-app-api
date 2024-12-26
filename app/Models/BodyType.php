<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BodyType extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'name',
    ];

    public function vehicle() {
        return $this->hasMany(Vehicle::class, 'body_type_id');
    }
}
