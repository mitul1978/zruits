<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ColorPalette extends Model
{
    protected $fillable=['name',	'color_palette_design_id'	,	'status'];


    public function products()
    {
        return $this->belongsToMany('App\Models\Product', 'color_palette_product',
        'color_palette_id', 'product_id')->withPivot('sort_order','status')->wherePivot('status',1);
    }

    public function pivot_color_palette_product()
    {
        return $this->hasMany('App\Models\ColorPaletteProduct')->orderBy('sort_order');
    }


    public function color_palette_design()
    {
        return $this->belongsTo('App\Models\ColorPaletteDesign', 'color_palette_design_id');
    }

}
