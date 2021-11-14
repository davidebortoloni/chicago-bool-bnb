<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Address extends Model
{
    use SoftDeletes;
    protected $fillable = ['street', 'number', 'city', 'cap', 'province', 'region', 'lat', 'lon', 'apartment_id'];

    public function apartment()
    {
        return $this->belongsTo('App\Models\Apartment');
    }
}
