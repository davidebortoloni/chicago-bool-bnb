<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Apartment extends Model
{
    use SoftDeletes;
    protected $fillable = ['description', 'n_rooms', 'n_beds', 'n_baths', 'sqrmt', 'image', 'visibility', 'user_id', 'title'];

    public function address()
    {
        return $this->hasOne('App\Models\Address');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function messages()
    {
        return $this->hasMany('App\Models\Message');
    }

    public function views()
    {
        return $this->hasMany('App\Models\View');
    }

    public function sponsorships()
    {
        return $this->belongsToMany('App\Models\Sponsorship');
    }

    public function services()
    {
        return $this->belongsToMany('App\Models\Service');
    }
}
