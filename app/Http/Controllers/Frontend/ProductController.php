<?php

namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Application;
use App\Models\Laminate;
use App\Models\Texture;
use App\Models\Size;
use App\Models\Color;
use App\Models\ColorPalette;

Use Alert;

use DB;

class ProductController extends Controller
{

    public function products(Request $request)
    {
        $requestData = $request->all();
        $keyword  = $request->get('search');

        // $laminates=Laminate::where('status','1')->get();
        // $applications=Application::where('status','1')->get();
        // $textures=Texture::where('status','1')->get();
        $count = Product::where('status','1')->count();
        // $selected_lam=[];
        // $selected_apps=[];
        // $selected_text=[];

        // if(count( $requestData)){
        //     $selected_lam = @$requestData['laminates'] ? explode(',',$requestData['laminates'] ) : [];
        //     $selected_apps = @$requestData['applications'] ? explode(',',$requestData['applications'] ) : [];
        //     $selected_text = @$requestData['textures'] ? explode(',',$requestData['textures'] ) : [];
        // }


            $products=Product::withCount('user_wishlist')
            // ->where(function($r) use( $selected_apps){
            //     if(count($selected_apps))
            //     $r->whereHas('applications',function($application) use( $selected_apps){
            //         if(count($selected_apps))
            //         $application->whereIn('name', $selected_apps);
            //     });

            // })            
            ->where(function($t) use( $keyword){
                if(@$keyword)
                $t->where('name', 'LIKE', "%$keyword%")
                ->orWhere('slug', 'LIKE', "%$keyword%");
            })

            ->where('status','active')->where('is_giftcard',0)->latest()->paginate(9);
        $sizes = Size::where('status',1)->get();
        $colors = Color::where('status',1)->get();

        if ($request->ajax()) 
        {
            return response()->json($products);
        }
        else
        {  
          $pageType = 'Shop By Products';
          return view('frontend.products',compact('products','pageType','sizes','colors'));
        }
    }



    public function product(Request $request)
    {   
        $slug = $request->slug;
        $product = Product::withCount('user_wishlist')->where('slug',$slug)->first();
        // $color_palette_products = Product::with('color_palettes')->whereHas('color_palettes',function($query) use($product){
        //     $query->where('color_palette_id',$product->color_palettes->pluck('id')->toArray());
        // })->get();
        return view('frontend.product',compact('product'));
    }
}
