<?php

namespace App\Models;
use DB;
use Illuminate\Database\Eloquent\Model;
use App\Models\Cart;
use App\Models\Offer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{

    use SoftDeletes;

    protected $attributes = ['in_cart' => false];

    protected $fillable=['category_id','name','design','hsn','fabric','orientation','related_products','min_qty','is_featured','is_new','is_bestsellers','is_offer','offer','price','stock_quantity','description','additional_information','discount','slug','a4sheet_view','fullsheet_view','room_view','meta_title','meta_description','meta_image','meta_keyword','status','sort_order','tags','tag'];
    protected $appends = ['discounted_amt'];

    public function toArray()
    {
        $array = parent::toArray();
        $array['in_cart'] = $this->in_cart;
        return $array;
    }

    public function  getDiscountedAmtAttribute()
    {   
        return $this->price - ($this->price * $this->discount)/100;
    }
    
    public function category(){
        return $this->belongsTo('App\Models\Category','category_id');
    }

    public function pfabric(){
        return $this->belongsTo('App\Models\Category','fabric');
    }

    public function poffer()
    {   
        return $this->belongsTo('App\Models\Offer','offer');
    }

    public function getOrientations()
    { 
        if(isset($this->orientation))
        {
            $ids = unserialize($this->orientation);
            $orientations =  DB::table('orientations')
                            ->select(DB::raw("group_concat(orientations.name) as names"))
                            ->whereIn('id',$ids)
                            ->get(); 
            return $orientations[0]->names;
        }
        else
        {
            return '';
        }
    }

    public function getRelatedProducts()
    {
        if(isset($this->related_products))
        {
            $ids = unserialize($this->related_products);
            $products =  DB::table('products')
                            ->select(DB::raw("group_concat(products.name) as names"))
                            ->whereIn('id',$ids)
                            ->get(); 
            return $products[0]->names;
        }
        else
        {
            return '';
        }
    }

    public function cat_info(){
        return $this->hasOne('App\Models\Category','id','cat_id');
    }
    public function sub_cat_info(){
        return $this->hasOne('App\Models\Category','id','child_cat_id');
    }
    public static function getAllProduct(){
        return Product::with(['cat_info','sub_cat_info'])->orderBy('id','desc')->paginate(10);
    }
    public function rel_prods(){
        return $this->hasMany('App\Models\Product','cat_id','cat_id')->where('status','active')->orderBy('id','DESC')->limit(8);
    }
    public function getReview(){
        return $this->hasMany('App\Models\ProductReview','product_id','id')->with('user_info')->where('status','active')->orderBy('id','DESC');
    }

    public static function getProductBySlug($slug){
        return Product::with(['cat_info','rel_prods','getReview'])->where('slug',$slug)->first();
    }
    public static function countActiveProduct(){
        $data=Product::where('status','active')->count();
        if($data){
            return $data;
        }
        return 0;
    }

    public function images()
    {
        return $this->hasMany('App\Models\ProductImage','product_id');
    }

    public function sizesstock()
    {
        return $this->hasMany('App\Models\ProductStock','product_id');
    }


    public function available(){
        return $this->hasMany('App\Models\Product','product_texture','product_texture')->take(9);
    }
    public function carts(){
        return $this->hasMany(Cart::class)->whereNotNull('order_id');
    }

    public function wishlists(){
        return $this->hasMany(Wishlist::class)->whereNotNull('cart_id');
    }

    public function user_wishlist(){

        if(Auth::check()) 
            return $this->hasOne(Wishlist::class)->whereNull('cart_id')->where('user_id',Auth::Id());
        else
            return $this->hasOne(Wishlist::class)->whereNull('cart_id')->where('user_id',-1);

    }



    public function getInCartAttribute()
    {
        return is_product_in_cart($this->id);
    }

    //PIVOT TABLES

    public function applications()
    {
        return $this->belongsToMany('App\Models\Application', 'application_product',
        'product_id','application_id');
    }

    public function attributes()
    {
        return $this->belongsToMany('App\Models\Attribute', 'attribute_product',
        'product_id','attribute_id');
    }

    public function characteristics()
    {
        return $this->belongsToMany('App\Models\Characteristic', 'characteristic_product',
        'product_id','characteristic_id')->withPivot('characteristic_value', 'sort_order');
    }

    public function features()
    {
        return $this->belongsToMany('App\Models\Feature', 'feature_product',
        'product_id','feature_id')->orderBy('sort_order');
    }

    public function laminates()
    {
        return $this->belongsToMany('App\Models\Laminate', 'laminate_product',
        'product_id','laminate_id');
    }

    public function textures()
    {
        return $this->belongsToMany('App\Models\Texture', 'product_texture',
        'product_id','texture_id');
    }


    public function thicknesses()
    {
        return $this->belongsToMany('App\Models\Thickness', 'product_thickness',
        'product_id','thickness_id')->orderBy('sort_order');
    }



    public function color_palettes()
    {
        return $this->belongsToMany('App\Models\ColorPalette', 'color_palette_product',
        'product_id','color_palette_id')->withPivot('sort_order')->orderBy('sort_order');
    }



}
