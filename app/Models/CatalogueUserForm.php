<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CatalogueUserForm extends Model
{

    protected $fillable = ['name',	'email','contact','message','catalogue_id','utm_source','utm_medium','utm_campaign','utm_display','type','flag','userid','state_id','city_id',	'city_text','gclid'	,'crm_status'];

}
