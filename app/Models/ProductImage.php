<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    protected $fillable=['product_id','color_id','image']; 
    
    public function singleProduct(){
        return $this->belongsTo('App\Models\Product','product_id');
    }

    public function productColor(){
        return $this->belongsTo('App\Models\Color','color_id');
    }
}
