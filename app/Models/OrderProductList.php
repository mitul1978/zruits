<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OrderProductList extends Model
{
    use HasFactory;

    use SoftDeletes;

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
    
    public function order(){
        return $this->belongsTo(Order::class,'order_id');
    }

}
