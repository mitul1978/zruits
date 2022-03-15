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
use App\Models\SizeChart;
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
            $value = isset($request->value) ? $request->value : null;

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
                ->orWhere('slug', 'LIKE', "%$keyword%")
                ->orWhere('design', 'LIKE', "%$keyword%");
            })

            ->where('status','1')->where('is_giftcard',0)->latest()->paginate(12);

            $sizes = Size::where('status',1)->get();
            $colors = Color::where('status',1)->get();
            $fabrics = Fabric::where('status',1)->get();
            $orientations = Orientation::where('status',1)->get();  

            if ($request->ajax()) 
            {   
                return view('frontend.productlisting',['products'=> $products,'value' => $value]);
                //return response()->json($products);
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
        $sizeCharts = SizeChart::where('status',1)->take(2)->get();
        // $color_palette_products = Product::with('color_palettes')->whereHas('color_palettes',function($query) use($product){
        //     $query->where('color_palette_id',$product->color_palettes->pluck('id')->toArray());
        // })->get();
        if($request->ajax())
        {   
            $colorId =  $request->colorId;
            return view('frontend.singleProduct', ['product'=> $product,'colorId' => $colorId,'sizeCharts' => $sizeCharts]); 
            // $html = '';

            // $availableColors = $product->sizesstock()->groupBy('color_id')->get();
            // $availableSizes = $product->sizesstock()->groupBy('size_id')->get();

            // $html = '<div class="row">
            //                 <div class="col-md-6">
            //                     <div class="product-gallery product-gallery-vertical">
            //                         <div class="row">
            //                             <figure class="product-main-image">
            //                                 <img id="product-zoom" src="'.asset(@$product->images()->first()->image).'" data-zoom-image="'.asset(@$product->images()->first()->image).'" alt="product image">

            //                                 <a href="#" id="btn-product-gallery" class="btn-product-gallery">
            //                                     <i class="icon-arrows"></i>
            //                                 </a>
            //                             </figure>

            //                             <div id="product-zoom-gallery" class="product-image-gallery">';
            //                                 foreach($product->images as $key => $image)
            //                                 {
            //                                     if($key == 0)
            //                                     {
            //                                       $html .= '<a class="product-gallery-item active" href="#" data-image="'.asset(@$image->image).'" data-zoom-image="'.asset(@$image->image).'">
            //                                             <img src="'.asset(@$image->image).'" alt="product side">
            //                                         </a>';
            //                                     }    
            //                                     else
            //                                     {
            //                                         $html .= '<a class="product-gallery-item" href="#" data-image="'.asset(@$image->image).'" data-zoom-image="'.asset(@$image->image).'">
            //                                             <img src="'.asset(@$image->image).'" alt="product side">
            //                                         </a>';
            //                                     } 
            //                                 }

            //                            $html .= '</div>
            //                         </div>
            //                     </div>
            //                 </div>

            //                 <div class="col-md-6">
            //                     <div class="product-details">
            //                         <h1 class="product-title">'.$product->name.'</h1>

            //                         <div class="product-price">
            //                             ₹ ' .$product->price. '  <small>(MRP incl Taxes)</small>
            //                         </div>

            //                         <div class="product-content">
            //                             ' . $product->title . '
            //                         </div>                                    
            //                         <div class="table-cell radio-cell">
            //                             <div class="label text-underline fw-400 mr-4">Color</div>
            //                             <div id="" class="d-flex">';
            //                                 if(isset($availableColors) && $availableColors->isNotEmpty()) 
            //                                 { 
            //                                    foreach($availableColors as $color)                                     
            //                                    { 
            //                                        $html .= '<div class="radio has-color">
            //                                                     <label>
            //                                                         <input type="radio" name="color" value="'.@$color->color_id.'" class="p-cradio colorOptions">
            //                                                         <div class="custom-color"><span style="background-color:'.@$color->productColor->code.'" ></span></div>
            //                                                     </label>
            //                                                 </div>';
            //                                     }
            //                                 }                                            
            //                           $html.=  '</div>
            //                         </div>

            //                         <div class="table-cell radio-cell">
            //                             <div class="label text-underline fw-400 mr-4">Size</div>
            //                             <div id="" class="d-flex">';
            //                                 if(isset($availableSizes) && $availableSizes->isNotEmpty()) 
            //                                 { 
            //                                    foreach($availableSizes as $size) 
            //                                    {             
            //                                      $html .= '<div class="radio has-image">
            //                                         <label>
            //                                             <input type="radio" name="size" value="{{@$size->size_id}}" class="p-cradio ">
            //                                             <div class="custom-size"><span>{{@$size->productSize->name}}</span></div>
            //                                         </label>
            //                                      </div>';
            //                                    }
            //                                 }     
                                           
            //                             $html .= '</div>
            //                             <a href="#" class="size-guide"><i class="icon-th-list"></i>size guide</a>
            //                         </div>

            //                         <div id="displayProdCount">                           
            //                         </div>

            //                         <div class="details-filter-row details-row-size">
            //                             <label for="qty">Qty:</label>
            //                             <div class="product-details-quantity">
            //                                 <input type="number" id="qty" class="form-control" value="1" min="1" max="5" step="1" data-decimals="0" required>
            //                             </div>
            //                         </div>

            //                         <div class="details-filter-row details-row-size">
            //                             <label id="availableContsu"></label>                                        
            //                         </div>

            //                         <div class="product-details-action">
            //                             <a href="javascript:void(0);" class="btn-product btn-cart add_to_cart" data-id="{{$product->id}}"><span class="product{{$product->id}}">Add to cart</span></a>
            //                             <div class="details-action-wrapper">
            //                                 @if(is_user_logged_in())
            //                                     <a href="javascript:void(0);" class="btn-product btn-wishlist btn-expandable add_to_wishlist" title="Wishlist" data-id="{{$product->id}}" id="wishlist{{$product->id}}"><span class="add_to_wishlist_msg{{$product->id}}">Add to Wishlist</span></a>
            //                                 @else
            //                                     <a href="#signin-modal" data-toggle="modal" class="btn-product btn-wishlist btn-expandable" title="Wishlist" data-id="{{$product->id}}" id="wishlist{{$product->id}}">Add to Wishlist</a>
            //                                 @endif                                            
            //                             </div>
            //                         </div>

            //                         <div class="product-details-footer">
            //                             <div class="product-cat">
            //                                 <span>Category:</span>
            //                                 <a href="javascript:void(0);">{{$product->category->title}}</a>
            //                             </div>

            //                             <div class="social-icons social-icons-sm">
            //                                 <span class="social-label">Share:</span>
            //                                 <a href="#" class="social-icon" title="Facebook" target="_blank"><i class="icon-facebook-f"></i></a>
            //                                 <a href="#" class="social-icon" title="Twitter" target="_blank"><i class="icon-twitter"></i></a>
            //                                 <a href="#" class="social-icon" title="Instagram" target="_blank"><i class="icon-instagram"></i></a>
            //                                 <a href="#" class="social-icon" title="Pinterest" target="_blank"><i class="icon-pinterest"></i></a>
            //                             </div>
            //                         </div>
            //                     </div>
            //                 </div>
            //             </div>';
                     
            // return $html;
        }
        else
        {   
            $relatedProducts = null;
            if(isset($product->related_products))
            {
                $relatedProducts = unserialize($product->related_products);
                $relatedProducts = Product::whereIn('id',$relatedProducts)->where('status',1)->get();
            }
           
            return view('frontend.product',compact('product','relatedProducts','sizeCharts'));
        }       
    }

    public function filterProduct(Request $request)
    {
        $keyword  = $request->get('search');
        $flag = isset($request->flag) ? $request->flag : null;
        $sizes = isset($request->sizes) ? $request->sizes : null;
        $colors = isset($request->colors) ? $request->colors : null;
        $fabric = isset($request->fabrics) ? $request->fabrics : null;
        $orientations = isset($request->orientations) ? $request->orientations : null;
        $fromPrice = isset($request->fromPrice) ? $request->fromPrice : null;
        $toPrice = isset($request->toPrice) ? $request->toPrice : null;
        $value = isset($request->value) ? $request->value : null;
        $pageType = isset($request->pageType) ? $request->pageType : null;
        $min = isset($request->min) ? $request->min : null;
        $max = isset($request->max) ? $request->max : null;
        $pageValue = isset($request->pageValue) ? $request->pageValue : null;

        $products = Product::withCount('user_wishlist');

        // if($flag == 1)
        // {              
                if($sizes)
                {
                    $products->where(function($r) use( $sizes)
                    {
                        $r->whereHas('sizesstock',function($size) use( $sizes)
                        {
                            $size->whereIn('size_id', $sizes);
                        });   
                    });
                }

                if($colors)
                {
                    $products->where(function($r) use( $colors)
                    {
                        $r->whereHas('sizesstock',function($color) use( $colors)
                        {
                            $color->whereIn('color_id', $colors);
                        });   
                    });
                }

                if($fabric)
                {
                    $products->whereIn('fabric',$fabric);
                }

                if($orientations)
                {  
                    $length = strlen((string)$orientations);
                    $products->where('orientation','like', '%;s:'.$length .':"'.$orientations.'";%' );
                    // $products->map(function($i) use($orientations){
                    //    if($i->orientation)
                    //    {
                    //     $i->orientation = unserialize($i->orientation);
                    //    if (count(array_intersect($i->orientation, $orientations)) === 0) {
                    //         // No values from array1 are in array 2
                    //     } else {
                    //         // There is at least one value from array1 present in array2
                    //     }
                    //    }
                    // });
                }

                if($min)
                {
                    $products->where('price', '>=', $min);
                }

                if($max)
                {
                    $products->where('price', '<=', $max);
                }

                if($pageType != 0)
                {
                    $products->where('category_id',$pageType);
                }

                if($pageValue != 0)
                {
                    $products->whereIn('offer',[$pageValue,3]);
                }
    
                if($value == 'latest')
                {
                    $products =  $products->where('status','1')->where('is_giftcard',0)->latest()->paginate(12); 
                }
                else if($value == 'discount')
                {
                    $products =  $products->where('status','1')->where('is_giftcard',0)->orderBy('discount','DESC')->paginate(12); 
                }
                else if($value == 'high')
                {
                    $products =  $products->where('status','1')->where('is_giftcard',0)->orderBy('price','DESC')->paginate(12); 
                }
                else if($value == 'low')
                {
                    $products =  $products->where('status','1')->where('is_giftcard',0)->orderBy('price','ASC')->paginate(12); 
                }  
                else
                {
                    $products =  $products->where('status','1')->where('is_giftcard',0)->paginate(12); 
                }

                
        // }
        // else
        // {   
        //         if($pageType != 0)
        //         {
        //             $products->where('category_id',$pageType);
        //         }
                
        //         if($sizes)
        //         {
        //             $products->where(function($r) use( $sizes)
        //             {
        //                 $r->whereHas('sizesstock',function($size) use( $sizes)
        //                 {
        //                     $size->whereIn('size_id', $sizes);
        //                 });   
        //             });
        //         }

        //         if($colors)
        //         {
        //             $products->where(function($r) use( $colors)
        //             {
        //                 $r->whereHas('sizesstock',function($color) use( $colors)
        //                 {
        //                     $color->whereIn('color_id', $colors);
        //                 });   
        //             });
        //         }

        //         if($fabric)
        //         {
        //             $products->whereIn('fabric',$fabric);
        //         }

        //         if($orientations)
        //         {  
        //             $orientations = serialize($orientations);
        //             $products->where('orientation','like', '%' . $orientations .'%' );
        //         }

        //         if($min)
        //         {
        //             $products->where('price', '>=', $min);
        //         }

        //         if($max)
        //         {
        //             $products->where('price', '<=', $max);
        //         }

        //         $products =  $products->where('status','1')->where('is_giftcard',0)->latest()->paginate(9);    
        // }        

      
      
        // if ($request->ajax()) 
        // {
            //$returnHTML = view('frontend.productlisting',[' products'=> $products])->render();// or method that you prefere to return data + RENDER is the key here
            return view('frontend.productlisting', ['products'=> $products,'value' => $value,'pageValue' => $pageValue]); //response()->json( array('success' => true, 'html'=>$returnHTML) );
        // }
        // else
        // {  
        //     $pageType = 'Shop By Products';
        //     return view('frontend.products',compact('products','pageType','sizes','colors','fabrics','orientations','maxValue'));
        // }
       
        // return view('frontend.products',compact('products'));
    }

    public function filterSingleProduct(Request $request)
    {
        dd($request);
    }
}
