<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pincode extends Model
{


    protected $fillable=['state_id','city_id'];

    public function state()
    {
        return $this->belongsTo('App\Models\State', 'state_id');
    }


    public function city()
    {
        return $this->belongsTo('App\Models\City', 'city_id');
    }


}
