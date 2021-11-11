<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $fillable = ['street', 'number', 'city', 'cap', 'province', 'region', 'lat', 'lon', 'apartment_id'];

    public function apartment()
    {
        return $this->belongsTo('App\Models\Apartment');
    }
}
