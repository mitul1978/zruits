<?php

namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Application;
use App\Models\Laminate;
use App\Models\Texture;
use App\Models\Size;
use App\Models\Fabric;
use App\Models\Color;
use App\Models\ColorPalette;

Use Alert;
use App\Models\Orientation;
use DB;

class ProductController extends Controller
{

    public function products(Request $request)
    {
            $requestData = $request->all();
            $keyword  = $request->get('search');
            $flag = $request->flag ? $request->flag:null;

            // $laminates=Laminate::where('status','1')->get();
            // $applications=Application::where('status','1')->get();
            // $textures=Texture::where('status','1')->get();
            $count = Product::where('status','1')->count();
            $maxValue = Product::where('is_giftcard',0)->max('price');
            // $selected_lam=[];
            // $selected_apps=[];
            // $selected_text=[];

            // if(count( $requestData)){
            //     $selected_lam = @$requestData['laminates'] ? explode(',',$requestData['laminates'] ) : [];
            //     $selected_apps = @$requestData['applications'] ? explode(',',$requestData['applications'] ) : [];
            //     $selected_text = @$requestData['textures'] ? explode(',',$requestData['textures'] ) : [];
            // }


            $products = Product::withCount('user_wishlist')
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

            ->where('status','1')->where('is_giftcard',0)->latest()->paginate(9);
            $sizes = Size::where('status',1)->get();
            $colors = Color::where('status',1)->get();
            $fabrics = Fabric::where('status',1)->get();
            $orientations = Orientation::where('status',1)->get();  

            if ($request->ajax()) 
            {
                return response()->json($products);
            }
            else
            {  
                $pageType = 'Shop By Products';
                return view('frontend.products',compact('products','pageType','sizes','colors','fabrics','orientations','maxValue'));
            }
    }



    public function product(Request $request)
    {   
        $slug = $request->slug;
        $product = Product::withCount('user_wishlist')->where('slug',$slug)->first();
        // $color_palette_products = Product::with('color_palettes')->whereHas('color_palettes',function($query) use($product){
        //     $query->where('color_palette_id',$product->color_palettes->pluck('id')->toArray());
        // })->get();
        if($request->ajax())
        {
            $html = '';

            $availableColors = $product->sizesstock()->groupBy('color_id')->get();
            $availableSizes = $product->sizesstock()->groupBy('size_id')->get();

            $html = '<div class="row">
                            <div class="col-md-6">
                                <div class="product-gallery product-gallery-vertical">
                                    <div class="row">
                                        <figure class="product-main-image">
                                            <img id="product-zoom" src="'.asset(@$product->images()->first()->image).'" data-zoom-image="'.asset(@$product->images()->first()->image).'" alt="product image">

                                            <a href="#" id="btn-product-gallery" class="btn-product-gallery">
                                                <i class="icon-arrows"></i>
                                            </a>
                                        </figure>

                                        <div id="product-zoom-gallery" class="product-image-gallery">';
                                            foreach($product->images as $key => $image)
                                            {
                                                if($key == 0)
                                                {
                                                  $html .= '<a class="product-gallery-item active" href="#" data-image="'.asset(@$image->image).'" data-zoom-image="'.asset(@$image->image).'">
                                                        <img src="'.asset(@$image->image).'" alt="product side">
                                                    </a>';
                                                }    
                                                else
                                                {
                                                    $html .= '<a class="product-gallery-item" href="#" data-image="'.asset(@$image->image).'" data-zoom-image="'.asset(@$image->image).'">
                                                        <img src="'.asset(@$image->image).'" alt="product side">
                                                    </a>';
                                                } 
                                            }

                                       $html .= '</div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="product-details">
                                    <h1 class="product-title">'.$product->name.'</h1>

                                    <div class="product-price">
                                        ₹ ' .$product->price. '  <small>(MRP incl Taxes)</small>
                                    </div>

                                    <div class="product-content">
                                        ' . $product->title . '
                                    </div>                                    
                                    <div class="table-cell radio-cell">
                                        <div class="label text-underline fw-400 mr-4">Color</div>
                                        <div id="" class="d-flex">';
                                            if(isset($availableColors) && $availableColors->isNotEmpty()) 
                                            { 
                                               foreach($availableColors as $color)                                     
                                               { 
                                                   $html .= '<div class="radio has-color">
                                                                <label>
                                                                    <input type="radio" name="color" value="'.@$color->color_id.'" class="p-cradio colorOptions">
                                                                    <div class="custom-color"><span style="background-color:'.@$color->productColor->code.'" ></span></div>
                                                                </label>
                                                            </div>';
                                                }
                                            }                                            
                                      $html.=  '</div>
                                    </div>

                                    <div class="table-cell radio-cell">
                                        <div class="label text-underline fw-400 mr-4">Size</div>
                                        <div id="" class="d-flex">';
                                            if(isset($availableSizes) && $availableSizes->isNotEmpty()) 
                                            { 
                                               foreach($availableSizes as $size) 
                                               {             
                                                 $html .= '<div class="radio has-image">
                                                    <label>
                                                        <input type="radio" name="size" value="{{@$size->size_id}}" class="p-cradio ">
                                                        <div class="custom-size"><span>{{@$size->productSize->name}}</span></div>
                                                    </label>
                                                 </div>';
                                               }
                                            }     
                                           
                                        $html .= '</div>
                                        <a href="#" class="size-guide"><i class="icon-th-list"></i>size guide</a>
                                    </div>

                                    <div id="displayProdCount">                           
                                    </div>

                                    <div class="details-filter-row details-row-size">
                                        <label for="qty">Qty:</label>
                                        <div class="product-details-quantity">
                                            <input type="number" id="qty" class="form-control" value="1" min="1" max="5" step="1" data-decimals="0" required>
                                        </div>
                                    </div>

                                    <div class="details-filter-row details-row-size">
                                        <label id="availableContsu"></label>                                        
                                    </div>

                                    <div class="product-details-action">
                                        <a href="javascript:void(0);" class="btn-product btn-cart add_to_cart" data-id="{{$product->id}}"><span class="product{{$product->id}}">Add to cart</span></a>
                                        <div class="details-action-wrapper">
                                            @if(is_user_logged_in())
                                                <a href="javascript:void(0);" class="btn-product btn-wishlist btn-expandable add_to_wishlist" title="Wishlist" data-id="{{$product->id}}" id="wishlist{{$product->id}}"><span class="add_to_wishlist_msg{{$product->id}}">Add to Wishlist</span></a>
                                            @else
                                                <a href="#signin-modal" data-toggle="modal" class="btn-product btn-wishlist btn-expandable" title="Wishlist" data-id="{{$product->id}}" id="wishlist{{$product->id}}">Add to Wishlist</a>
                                            @endif                                            
                                        </div>
                                    </div>

                                    <div class="product-details-footer">
                                        <div class="product-cat">
                                            <span>Category:</span>
                                            <a href="javascript:void(0);">{{$product->category->title}}</a>
                                        </div>

                                        <div class="social-icons social-icons-sm">
                                            <span class="social-label">Share:</span>
                                            <a href="#" class="social-icon" title="Facebook" target="_blank"><i class="icon-facebook-f"></i></a>
                                            <a href="#" class="social-icon" title="Twitter" target="_blank"><i class="icon-twitter"></i></a>
                                            <a href="#" class="social-icon" title="Instagram" target="_blank"><i class="icon-instagram"></i></a>
                                            <a href="#" class="social-icon" title="Pinterest" target="_blank"><i class="icon-pinterest"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>';
                     
            return $html;
        }
        else
        {
            return view('frontend.product',compact('product'));
        }       
    }
}
