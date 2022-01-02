<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CharacteristicProduct extends Model
{

    protected $table = 'characteristic_product';
    protected $fillable=['product_id',	'characteristic_id'	,'characteristic_value',	'sort_order'];


}
