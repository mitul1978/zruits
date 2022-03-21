<?php

namespace App\Http\Controllers;

use App\Models\Feature;
use App\Models\Product;
use App\Models\ProductStock;
use App\Models\ProductImage;
use App\Models\Texture;
use App\Models\Category;
use App\Models\Laminate;
use App\Models\Attribute;
use App\Models\Thickness;
use App\Models\Color;
use App\Models\Size;
use App\Models\Fabric;
use App\Models\Orientation;
use App\Models\Application;
use Illuminate\Support\Str;
use App\Models\ColorPalette;
use Illuminate\Http\Request;
use App\Models\Characteristic;
use App\Models\CharacteristicProduct;
use Illuminate\Support\Facades\DB;
use App\Imports\ProductsImport;
use App\Imports\ProductImagesImport;
use App\Imports\ProductStocksImport;
use App\Exports\ProductStocksExport;
use App\Exports\ProductImagesExport;
use App\Exports\ProductsExport;
use Maatwebsite\Excel\Facades\Excel;
use File;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');

        if (!empty($keyword)) 
        {
            $products = Product::where('name', 'LIKE', "%$keyword%")
                ->orwhere('slug', 'LIKE', "%$keyword%")
                ->orwhere('description', 'LIKE', "%$keyword%")
                ->orwhere('additional_information', 'LIKE', "%$keyword%")
                ->orwhere('price', 'LIKE', "%$keyword%")
                ->orwhere('design', 'LIKE', "%$keyword%")
                ->orwhere('hsn', 'LIKE', "%$keyword%")
                ->latest()->paginate(20);
        } 
        else 
        {
            $products = Product::latest()->paginate(20);
        }

        // $products=Product::latest()->paginate(5);
        // return $products;
        return view('backend.product.index')->with('products',$products);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $colors         = Color::where('status',1)->get();
        $sizes           = Size::where('status',1)->get();
        $fabrics           = Fabric::where('status',1)->get();
        $orientations           = Orientation::where('status',1)->get();
        $related_products   = Product::orderBy('name')->where('status',1)->where('is_giftcard',0)->get();
        $categories         = Category::pluck('title','id');

        return view('backend.product.create',compact('categories','related_products','colors','sizes','fabrics','orientations'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data=$request->all();

        $this->validate($request,[
             'category_id'=>'required',
             'name'=>'required',
             'design'=>'required',
             'hsn'=>'required',
             'fabric'=>'required',
             'orientation'=>'required',
             'price'=>'required',
             'min_qty'=>'required',
             'stock_quantities'=>"required",
             'description'=>'required',
             'additional_information'=>'required',
             'related_products'=>'required',
              "sizes"    => "required|array",
              'sizes.*'  =>'required',
              "colors"   => "required|array",
              'colors.*'=>'required',
             'images'=>'required',             
             'status'=>'required',            
             'discount'=>'required',             
        ]);

        $slug=Str::slug($request->name);
        $count= Product::where('slug',$slug)->count();
        if($count>0)
        {
            $slug=$slug.'-'.date('ymdis').'-'.rand(0,999);
        }

        $data['slug']=$slug;
        $data['title']=$request->name;
        $data['is_featured']=$request->input('is_featured',0);
        $data['is_new']=$request->input('is_new',0);
        $data['is_bestsellers']=$request->input('is_bestsellers',0);
        $data['related_products']=@$request->related_products && count($request->related_products) ? serialize($request->related_products) :null;
        $data['orientation']=@$request->orientation && count($request->orientation) ? serialize($request->orientation) :null;
        
        if($request->offer)
        {
            $data['is_offer'] = 1;
            $data['offer'] = $request->offer;
        }
        else
        {
            $data['is_offer'] = 0;
            $data['offer'] = 0;
        }
        // if($request->image1){
        //     $fileName = rand().time().'.'.$request->image1->getClientOriginalExtension();
        //     $request->image1->move(base_path('public/images/products'), $fileName);
        //     $data['image1']= $fileName;
        // }

        // if($request->image2){
        //     $fileName = rand().time().'.'.$request->image2->getClientOriginalExtension();
        //     $request->image2->move(base_path('public/images/products'), $fileName);
        //     $data['image2']= $fileName;
        // }

        // if($request->image3){
        //     $fileName = rand().time().'.'.$request->image3->getClientOriginalExtension();
        //     $request->image3->move(base_path('public/images/products'), $fileName);
        //     $data['image3']= $fileName;
        // }

        // if($request->meta_image){
        //     $fileName = rand().time().'.'.$request->meta_image->getClientOriginalExtension();
        //     $request->meta_image->move(base_path('public/images/products'), $fileName);
        //     $data['meta_image']= $fileName;
        // }

       // dd($data,$request);
       
        DB::beginTransaction();
        try
        {
           $status = Product::create($data);

           if($request->sizes)
           {   
               $sizes = $request->sizes;
               $colors = $request->colors;
               $quantities = $request->stock_quantities;
               
               foreach($sizes as $key => $size)
               {
                    $prodStock = new ProductStock;
                    $prodStock->product_id=$status->id;
                    $prodStock->size_id=$size;
                    $prodStock->color_id=$colors[$key];
                    $prodStock->stock_qty= $quantities[$key];
                    $prodStock->save();
               }
           }

           if($request->colorsImages)
           {
                foreach(@$request->colorsImages as $key => $color)
                { 
                        foreach($request->images[$key] as $image)
                        {                 
                                $icon=mt_rand();
                                $filename=$icon.$image->getClientOriginalName();
                                $image->move(public_path('/images/products'), $filename); 
                                $prodImage = new ProductImage;
                                $prodImage->product_id=$status->id;
                                $prodImage->color_id = $color;
                                $prodImage->image = '/images/products/'.$filename;
                                $prodImage->save();
                        }
                }
            }        

        //    if ($request->hasFile('images')) 
        //    {
                
        //    }    
        
        //Application
        // if(@$data['applications'] && count($data['applications'])){
        //    $status->applications()->attach($data['applications']);
        // }

        //Attributes
        // if(@$data['attributes'] && count($data['attributes'])){
        //    $status->attributes()->attach($data['attributes']);
        // }

        //Characteristics
        // if(@$data['characteristics'] && count($data['characteristics'])){
        //    $status->characteristics()->attach($data['characteristics']);
        // }

        //Features
        // if(@$data['features'] && count($data['features'])){
        //    $status->features()->attach($data['features']);
        // }

        //Laminates
        // if(@$data['laminates'] && count($data['laminates'])){
        //    $status->laminates()->attach($data['laminates']);
        // }


        // //Textures
        // if(@$data['textures'] && count($data['textures'])){
        //    $status->textures()->attach($data['textures']);
        //  }


        // //Thicknesses
        // if(@$data['thicknesses'] && count($data['thicknesses'])){
        //    $status->thicknesses()->attach($data['thicknesses']);
        // }

            if($status)
            {
                request()->session()->flash('success','Product Successfully added');
            }
            else
            {
                request()->session()->flash('error','Please try again!!');
            }
            DB::commit();
            return redirect()->route('product.index');
        }
        catch(exception $e)
        {
            DB::rollback();
            dd($e);
        }    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        dd(1323);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product=Product::findOrFail($id);      
        $related_products   = Product::orderBy('name')->where('status',1)->where('is_giftcard',0)->get();
        $categories         = Category::pluck('title','id');
        $colors         = Color::where('status',1)->get();   
        $sizes           = Size::where('status',1)->get(); 
        $fabrics           = Fabric::where('status',1)->get();   
        $orientations           = Orientation::where('status',1)->get();

        return view('backend.product.edit',compact('product','categories','related_products','colors','sizes','fabrics','orientations'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product=Product::findOrFail($id);
        $data=$request->all();

        $this->validate($request,[
             'category_id'=>'required',
             'name'=>'required',
             'design'=>'required',
             'hsn'=>'required',
             'fabric'=>'required',
             'orientation'=>'required',
             'price'=>'required',
             'min_qty'=>'required',
             'stock_quantities'=>"required",
             'description'=>'required',
             'additional_information'=>'required',
             'related_products'=>'required',     
             'status'=>'required',            
             'discount'=>'required',             
        ]);

        $data['is_featured']=$request->input('is_featured',0);
        $data['is_new']=$request->input('is_new',0);
        $data['is_bestsellers']=$request->input('is_bestsellers',0);
        $data['related_products']=@$request->related_products && count($request->related_products) ? serialize($request->related_products) :null;
        $data['orientation']=@$request->orientation && count($request->orientation) ? serialize($request->orientation) :null;

        if($request->offer)
        {
            $data['is_offer'] = 1;
            $data['offer'] = $request->offer;
        }
        else
        {
            $data['is_offer'] = 0;
            $data['offer'] = 0;
        }


        // if($request->meta_image){
        //     $fileName = 'images/products/meta_image/'.rand().time().'.'.$request->meta_image->getClientOriginalExtension();
        //     $request->photo->move(base_path('public/images/products/meta_image'), $fileName);
        //     $data['meta_image']= $fileName;
        // }
        // return $data;
       
        DB::beginTransaction();
        try
        {

           $status=$product->fill($data)->save();

                //Application
                // if(@$data['applications'] && count($data['applications'])){
                //     $product->applications()->sync($data['applications']);
                // }

                    //Attributes
                // if(@$data['attributes'] && count($data['attributes'])){
                //     $product->attributes()->sync($data['attributes']);
                // }

                    //Characteristics
                // if(@$data['characteristics'] && count($data['characteristics'])){
                //     $product->characteristics()->sync($data['characteristics']);
                // }

                    //Features
                // if(@$data['features'] && count($data['features'])){
                //     $product->features()->sync($data['features']);
                // }

                    //Laminates
                // if(@$data['laminates'] && count($data['laminates'])){
                //     $product->laminates()->sync($data['laminates']);
                // }


                    //Textures
                // if(@$data['textures'] && count($data['textures'])){
                //     $product->textures()->sync($data['textures']);
                // }


                    //Thicknesses
                // if(@$data['thicknesses'] && count($data['thicknesses'])){
                //     $product->thicknesses()->sync($data['thicknesses']);
                // }

                if($request->sizes)
                {   
                    $sizes = $request->sizes;
                    $colors = $request->colors;
                    $quantities = $request->stock_quantities;
                    
                    foreach($sizes as $key => $size)
                    {
                        ProductStock::updateOrCreate(['product_id'=> $id, 'size_id' => $size,'color_id' => $colors[$key]],['stock_qty' =>$quantities[$key]]);
                    }
                }
    
                if(count($request->colorsImages))
                {
                        foreach(@$request->colorsImages as $key => $color)
                        {  
                            if($color)
                            {
                                foreach($request->images[$key] as $image)
                                {                 
                                        $icon=mt_rand();
                                        $filename=$icon.$image->getClientOriginalName();
                                        $image->move(public_path('/images/products'), $filename); 
                                        $prodImage = new ProductImage;
                                        $prodImage->product_id=$id;
                                        $prodImage->color_id = $color;
                                        $prodImage->image = '/images/products/'.$filename;
                                        $prodImage->save();
                                }
                            }    
                        }
                }      

            if($status)
            {
                request()->session()->flash('success','Product Successfully updated');
            }
            else
            {
                request()->session()->flash('error','Please try again!!');
            }
            
            DB::commit();
            return redirect()->route('product.index');            
        }
        catch(exception $e)
        {
            DB::rollback();
            dd($e);
        }    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function deleteImage(Request $request)
    {
        $id = $request->id;

        $prodImage = ProductImage::findOrFail($id);
        $status = $prodImage->delete();

        if($status)
        {
            return 1;
        }
        else
        {
            return 0;
        }
    }

    public function deleteVariation(Request $request)
    {
        $id = $request->id;

        $prodVariation = ProductStock::findOrFail($id);
        $status = $prodVariation->delete();

        if($status)
        {
            return 1;
        }
        else
        {
            return 0;
        }
    }
    
    public function destroy($id)
    {
        $product=Product::findOrFail($id);
        $status=$product->delete();

        if($status){
            request()->session()->flash('success','Product successfully deleted');
        }
        else{
            request()->session()->flash('error','Error while deleting product');
        }
        return redirect()->route('product.index');
    }


    public function edit_characteristics($id)
    {
        $product=Product::findOrFail($id);
        return view('backend.product.edit-characteristics',compact('product'));
    }

    public function viewStock($id)
    {
        $product=Product::findOrFail($id);
        return view('backend.product.viewstock',compact('product'));
    }

    public function update_characteristics(Request $request, $product_id)
    {
        $product=Product::findOrFail($product_id);

        $product->characteristics()->sync(array_keys($request->characteristic_value));

        if(@$request->characteristic_value && count($request->characteristic_value)){

            foreach( $request->characteristic_value as $characteristic_id => $product){

                $data =[
                    'characteristic_value'=>@$request->characteristic_value[$characteristic_id] ,
                    'sort_order'=>@$request->sort_order[$characteristic_id],
                ];


              CharacteristicProduct::
                where('characteristic_id',$characteristic_id )
                ->where('product_id',$product_id )->update( $data);

            }
        }

        request()->session()->flash('success','Product characteristics updated successfully');
        return redirect()->route('product.index');
    }

    public function color_palette_preview($id){

        $color_palette = ColorPalette::with(['color_palette_design','products'=>function ($query) {
            $query->orderBy('pivot_sort_order');
        }])->findOrfail($id);

        return view('backend.product.color_palette_preview',compact('color_palette'));
    }

    public function importProducts()
    {
        return view('backend.product.importproducts');
    }

    public function importProductImages()
    {
        return view('backend.product.importproductimages');
    }

    public function importProductStocks()
    {
        return view('backend.product.importproductstocks');
    }

    public function storeImportProducts(Request $request) 
    {
        $datas = Excel::toArray(new ProductsImport, $request->file('file')); 
        
        foreach($datas[0] as $k => $v)
        {  
            if($k != 0)
            { 
                if($v[0] != '')
                {   
                    $product = Product::where('design',$v[2])->first();
                    if(!$product)
                    {               
                        $data['name']        = $v[1];
                        $data['category_id'] = Category::where('title',$v[0])->first()->id;
                        $data['title']       = $v[1];

                        $slug=Str::slug($v[1]);
                        $count= Product::where('slug',$slug)->count();
                        if($count>0)
                        {
                            $slug=$slug.'-'.date('ymdis').'-'.rand(0,999);
                        }
                
                        $data['slug']        = $slug;
                        $data['design']      = $v[2];
                        $data['hsn']         = $v[3];
                        $data['fabric']      = Fabric::where('name',$v[4])->first()->id;

                        $orientations = Orientation::whereIn('name',explode(',',$v[5]))->get()->pluck('id')->toArray();
                        if(count($orientations) > 0)
                        {
                            $orientations = serialize($orientations);
                        }
                        else
                        {
                            $orientations = null;
                        }

                        $data['orientation'] = $orientations;
                        $data['price']       = $v[6];
                        $data['discount']    = $v[7];                
                        $data['min_qty']     = $v[8];
                        $data['tag']         = $v[9];
                        $data['description'] = $v[10];
                        $data['additional_information']     = $v[11];
                        $data['meta_title']   = $v[12];
                        $data['meta_keyword'] = $v[13];
                        $data['meta_description'] = $v[14];

                        $relatedProducts = Product::whereIn('name',explode(',',$v[15]))->get()->pluck('id')->toArray();
                        if(count($relatedProducts) > 0)
                        {
                            $relatedProducts = serialize($relatedProducts);
                        }
                        else
                        {
                            $relatedProducts = null;
                        }

                        $data['related_products'] = $relatedProducts;
                        $data['is_featured']      = $v[16];
                        $data['is_new']           = $v[17];
                        $data['is_bestsellers']   = $v[18];
                        $data['is_offer']         = $v[19];
                        $data['offer']            = $v[20];
                        $data['status']           = $v[21];

                        Product::create($data);
                    }    
                    else
                    {
                        $product->name       = $v[1];
                        $product->category_id = Category::where('title',$v[0])->first()->id;
                        $product->title       = $v[1];

                        $slug=Str::slug($v[1]);
                        $count= Product::where('slug',$slug)->where('id','<>',$product->id)->count();
                        if($count > 0)
                        {
                            $slug = $slug.'-'.date('ymdis').'-'.rand(0,999);
                        }
                
                        $product->slug        = $slug;
                        $product->design      = $v[2];
                        $product->hsn         = $v[3];
                        $product->fabric      = Fabric::where('name',$v[4])->first()->id;

                        $orientations = Orientation::whereIn('name',explode(',',$v[5]))->get()->pluck('id')->toArray();
                        if(count($orientations) > 0)
                        {
                            $orientations = serialize($orientations);
                        }
                        else
                        {
                            $orientations = null;
                        }

                        $product->orientation = $orientations;
                        $product->price      = $v[6];
                        $product->discount    = $v[7];                
                        $product->min_qty     = $v[8];
                        $product->tag        = $v[9];
                        $product->description = $v[10];
                        $product->additional_information     = $v[11];
                        $product->meta_title   = $v[12];
                        $product->meta_keyword = $v[13];
                        $product->meta_description = $v[14];

                        $relatedProducts = Product::whereIn('name',explode(',',$v[15]))->get()->pluck('id')->toArray();
                        if(count($relatedProducts) > 0)
                        {
                            $relatedProducts = serialize($relatedProducts);
                        }
                        else
                        {
                            $relatedProducts = null;
                        }

                        $product->related_products = $relatedProducts;
                        $product->is_featured      = $v[16];
                        $product->is_new          = $v[17];
                        $product->is_bestsellers   = $v[18];
                        $product->is_offer         = $v[19];
                        $product->offer            = $v[20];
                        $product->status          = $v[21];
                        $product->update();
                    }
                }    
            }            
        }

        request()->session()->flash('success','Products successfully imported');
        return redirect('/admin/importProducts');
    }

    public function storeImportProductStocks(Request $request) 
    {
        $datas = Excel::toArray(new ProductStocksImport, $request->file('file')); 
        
        foreach($datas[0] as $k => $v)
        {  
            if($k != 0)
            {   
                if($v[0] != '')
                {  
                    $data['product_id']  = Product::where('name',$v[0])->first()->id;
                    $data['size_id']     = Size::where('name',$v[1])->first()->id;
                    $data['color_id']    = Color::where('name',$v[2])->first()->id;                
                    $data1['stock_qty']  = $v[3];
                    ProductStock::updateOrCreate($data,$data1);
                }    
            }            
        }

        request()->session()->flash('success','Product Stocks successfully imported');
        return redirect('/admin/importProductStocks');
    }

    public function storeImportProductImages(Request $request) 
    {
        $datas = Excel::toArray(new ProductImagesImport, $request->file('file')); 
        
        foreach($datas[0] as $k => $v)
        {  
            if($k != 0)
            { 
                if($v[0] != '')
                {  
                    $data['product_id']  = Product::where('name',$v[0])->first()->id;
                    $data['color_id']    = Color::where('name',$v[1])->first()->id;

                    $baseName = pathinfo($v[2]);
                    $baseName = $baseName['basename'];
                    $icon = mt_rand();
                    $filename = $icon . $baseName;
                    File::copy($v[2], public_path('/images/products/'.$filename));  

                    $data['image']       = '/images/products/'.$filename;                
                    ProductImage::create($data);
                }    
            }            
        }

        request()->session()->flash('success','Product Stocks successfully imported');
        return redirect('/admin/importProductImages');
    }

    public function exportStocks(){
        return Excel::download(new ProductStocksExport, 'ProductStocks.xlsx');
    }

    public function exportImages(){
        return Excel::download(new ProductImagesExport, 'ProductImages.xlsx');
    }

    public function exportProducts(){
        return Excel::download(new ProductsExport, 'Products.xlsx');
    }
}
