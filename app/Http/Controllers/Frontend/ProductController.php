<?php

namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Application;
use App\Models\Laminate;
use App\Models\Texture;
use App\Models\ColorPalette;

Use Alert;

use DB;

class ProductController extends Controller
{

    public function products(Request $request){


        $requestData = $request->all();
        $keyword  = $request->get('search') ;

        $laminates=Laminate::where('status','1')->get();
        $applications=Application::where('status','1')->get();
        $textures=Texture::where('status','1')->get();
        $count = Product::where('status','1')->count();
        $selected_lam=[];
        $selected_apps=[];
        $selected_text=[];

        if(count( $requestData)){
            $selected_lam = @$requestData['laminates'] ? explode(',',$requestData['laminates'] ) : [];
            $selected_apps = @$requestData['applications'] ? explode(',',$requestData['applications'] ) : [];
            $selected_text = @$requestData['textures'] ? explode(',',$requestData['textures'] ) : [];
        }


            $products=Product::withCount('user_wishlist')->where(function($q) use( $selected_lam){
                if(count($selected_lam))
                $q->whereHas('laminates',function($laminate) use( $selected_lam){
                    if(count($selected_lam))
                    $laminate->whereIn('name', $selected_lam);
                });

            })
            ->where(function($r) use( $selected_apps){
                if(count($selected_apps))
                $r->whereHas('applications',function($application) use( $selected_apps){
                    if(count($selected_apps))
                    $application->whereIn('name', $selected_apps);
                });

            })
            ->where(function($s) use( $selected_text){
                if(count($selected_text))
                $s->whereHas('textures',function($texture) use( $selected_text){
                    if(count($selected_text))
                    $texture->whereIn('name', $selected_text);
                });

            })
            ->where(function($t) use( $keyword){
                if(@$keyword)
                $t->where('name', 'LIKE', "%$keyword%")
                ->orWhere('slug', 'LIKE', "%$keyword%");
            })

            ->where('status','1')->orderBy('sort_order','ASC')->paginate(9);



        if ($request->ajax()) {
            return response()->json($products);
        }else{

          return view('frontend.pages.products',compact('products','laminates','applications','selected_apps','selected_lam','selected_text','textures'));
        }
    }



public function product(Request $request){

    $product = Product::withCount('user_wishlist')->with('available:product_texture,id,slug,fullsheet_view,a4sheet_view','color_palettes','thicknesses')->where('slug',$request->slug)->first();

    $color_palette_products = Product::with('color_palettes')->whereHas('color_palettes',function($query) use($product){
        $query->where('color_palette_id',$product->color_palettes->pluck('id')->toArray());
    })->get();

     return view('frontend.pages.product',compact('product','color_palette_products'));

    }

}
