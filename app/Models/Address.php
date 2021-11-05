<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    public function apartment()
    {
        return $this->belongsTo('App\Models\Apartment');
    }
}
