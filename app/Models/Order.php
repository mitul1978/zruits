<?php

namespace App\Models;
use App\Models\OrderProductList;



use Spatie\Activitylog\LogOptions;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{

    use LogsActivity,SoftDeletes;

    protected  $logName = 'order';

    // public bool $logOnlyDirty = true;

    protected $fillable=[
        'user_id','order_number','sub_total','quantity','delivery_charge','status','total_amount','total_discount','first_name','last_name','country','pincode','address','address2','phone','email','payment_method','payment_status','shipping_id','shiprocket_order_id'
        ,'coupon_id','coupon_code','coupon_value','giftcard_id','giftcard_code','giftcard_value'
        ,'freight_charge','state_id','city_id',	'contact_information','order_sequence'
    ];

    protected static $logAttributes = [
        'user_id','order_number','sub_total','quantity','delivery_charge','status','total_amount','first_name','last_name','country','pincode','address','address2','phone','email','payment_method','payment_status','shipping_id'
        ,'coupon_code','coupon_value'
        ,'freight_charge','state_id'	,'city_id',	'contact_information'];


    public function getDescriptionForEvent(string $eventName): string
    {
        return "This Order has been {$eventName} by ".auth()->user()->name;
    }

    public function cart_info(){
        return $this->hasMany('App\Models\Cart','order_id','id');
    }
    public static function getAllOrder($id){
        return Order::with('cart_info')->find($id);
    }
    public static function countActiveOrder(){
        $data=Order::count();
        if($data){
            return $data;
        }
        return 0;
    }
    public function cart(){
        return $this->hasMany(Cart::class);
    }

    public function shipping(){
        return $this->belongsTo(Shipping::class,'shipping_id');
    }
    
    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }


    public function state()
    {
        return $this->belongsTo('App\Models\State', 'state_id');
    }


    public function city()
    {
        return $this->belongsTo('App\Models\City', 'city_id');
    }

    public function address()
    {
        return $this->belongsTo('App\Models\UserAddress', 'address_id');
    }

    public function order_status()
    {
        return $this->belongsTo('App\Models\OrderStatus', 'status','order_status_id');
    }


    public function order_list(){
        return $this->hasMany(OrderProductList::class);
    }

}
