<?php

namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Wishlist;

class WishlistController extends Controller
{
    protected $product=null;
    public function __construct(Product $product)
    {
        $this->product=$product;
    }

    public function wishlist(Request $request)
    {        
        if (empty($request->product_id)) 
        {
            return response(['error'=>'Invalid Products'], 200);
        }

        $product = Product::where('status',1)->where('id', $request->product_id)->first();
        if (empty($product)) 
        {
            return response(['error'=>'Invalid Products'], 200);
        }

        $already_wishlist = Wishlist::where('user_id', auth()->user()->id)->where('cart_id',null)->where('product_id', $product->id)->first();

        if($already_wishlist) 
        {
            $already_wishlist->delete();
            return response(['wishlist_product'=>'Removed','msg'=> strtoupper($product->name. ' has been removed from wishlist')], 200);
        }
        else
        {
            $wishlist = new Wishlist;
            $wishlist->user_id = auth()->user()->id;
            $wishlist->product_id = $product->id;
            $wishlist->price = ($product->price-($product->price*$product->discount)/100);
            $wishlist->quantity = 1;
            $wishlist->amount=$wishlist->price*$wishlist->quantity;
            $wishlist->save();
        }

        return response(['wishlist_product'=>'Added','msg'=> strtoupper($product->name. ' has been added in wishlist')], 200);
    }

    public function wishlistDelete(Request $request)
    {
        $wishlist = Wishlist::find($request->id);
        if ($wishlist) 
        {
            $wishlist->delete();
            request()->session()->flash('success','Wishlist successfully removed');
            return back();
        }

        request()->session()->flash('error','Error please try again');
        return back();
    }
}
