<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    //

    protected $fillable = ['name','state_id','state_code','country_id',	'country_code',	'latitude','longitude','status','wikiDataId'];




    function state(){
       return $this->belongsTo('App\Models\State','state_id');
    }

}
