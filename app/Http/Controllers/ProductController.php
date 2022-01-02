<?php

namespace App\Http\Controllers;

use App\Models\Feature;
use App\Models\Product;
use App\Models\Texture;
use App\Models\Category;
use App\Models\Laminate;
use App\Models\Attribute;
use App\Models\Thickness;
use App\Models\Application;
use Illuminate\Support\Str;
use App\Models\ColorPalette;
use Illuminate\Http\Request;
use App\Models\Characteristic;
use App\Models\CharacteristicProduct;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products=Product::getAllProduct();
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
        $attributes         = Attribute::where('status',1)->get();
        // $applications       = Application::where('status',1)->get();
        // $characteristics    = Characteristic::where('status',1)->get();
        $features           = Feature::where('status',1)->get();
        // $laminates          = Laminate::where('status',1)->get();
        // $textures           = Texture::where('status',1)->get();
        //$thicknesses        = Thickness::where('status',1)->get();
        $related_products   = Product::orderBy('name')->where('status',1)->get();
        $categories         = Category::pluck('title','id');

        return view('backend.product.create',compact('categories','attributes','features','related_products'));
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
            //  'product_texture'=>'string|required',
             'category_id'=>'int|required',
             'name'=>'string|required',
             'design'=>'string|required',
             'is_featured'=>'sometimes|in:1',
             'price'=>'required|numeric',
             'stock_quantity'=>"required|numeric",
             'description'=>'string|nullable',
             'image1'=>'required',             
             'status'=>'required|in:1,0',            
            //  'discount'=>'nullable|numeric',             
        ]);

        $slug=Str::slug($request->name);
        $count=Product::where('slug',$slug)->count();
        if($count>0)
        {
            $slug=$slug.'-'.date('ymdis').'-'.rand(0,999);
        }

        $data['slug']=$slug;
        $data['is_featured']=$request->input('is_featured',0);
        $data['related_products']=@$request->related_products && count($request->related_products) ? serialize($request->related_products) :null;

        if($request->image1){
            $fileName = rand().time().'.'.$request->image1->getClientOriginalExtension();
            $request->image1->move(base_path('public/images/products'), $fileName);
            $data['image1']= $fileName;
        }

        if($request->image2){
            $fileName = rand().time().'.'.$request->image2->getClientOriginalExtension();
            $request->image2->move(base_path('public/images/products'), $fileName);
            $data['image2']= $fileName;
        }

        if($request->image3){
            $fileName = rand().time().'.'.$request->image3->getClientOriginalExtension();
            $request->image3->move(base_path('public/images/products'), $fileName);
            $data['image3']= $fileName;
        }

        // if($request->meta_image){
        //     $fileName = rand().time().'.'.$request->meta_image->getClientOriginalExtension();
        //     $request->meta_image->move(base_path('public/images/products'), $fileName);
        //     $data['meta_image']= $fileName;
        // }


        $status=Product::create($data);

        //Application
        // if(@$data['applications'] && count($data['applications'])){
        //    $status->applications()->attach($data['applications']);
        // }

        //Attributes
        if(@$data['attributes'] && count($data['attributes'])){
           $status->attributes()->attach($data['attributes']);
        }

        //Characteristics
        // if(@$data['characteristics'] && count($data['characteristics'])){
        //    $status->characteristics()->attach($data['characteristics']);
        // }

        //Features
        if(@$data['features'] && count($data['features'])){
           $status->features()->attach($data['features']);
        }

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

        if($status){
            request()->session()->flash('success','Product Successfully added');
        }
        else{
            request()->session()->flash('error','Please try again!!');
        }
        return redirect()->route('product.index');

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

        $attributes         = Attribute::where('status',1)->get();
        // $applications       = Application::where('status',1)->get();
        // $characteristics    = Characteristic::where('status',1)->get();
        $features           = Feature::where('status',1)->get();
        // $laminates          = Laminate::where('status',1)->get();
        // $textures           = Texture::where('status',1)->get();
        // $thicknesses        = Thickness::where('status',1)->get();
        $related_products   = Product::orderBy('name')->where('status',1)->get();
        $categories         = Category::pluck('title','id');

        return view('backend.product.edit',compact('categories','product','attributes','features','related_products'));

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
        $this->validate($request,[
            //  'product_texture'=>'string|required',
             'category_id'=>'int|required',
             'name'=>'string|required',
             'design'=>'string|required',
             'is_featured'=>'sometimes|in:1',
             'price'=>'required|numeric',
             'stock_quantity'=>"required|numeric",
             'description'=>'string|nullable',            
             'status'=>'required|in:1,0',             
            //  'discount'=>'nullable|numeric'
        ]);

        $data = $request->all();

        $data['related_products']=@$request->related_products && count($request->related_products) ? serialize($request->related_products) :null;

        if($request->image1){
            $fileName = rand().time().'.'.$request->image1->getClientOriginalExtension();
            $request->image1->move(base_path('public/images/products'), $fileName);
            $data['image1']= $fileName;
        }

        if($request->image2){
            $fileName = rand().time().'.'.$request->image2->getClientOriginalExtension();
            $request->image2->move(base_path('public/images/products'), $fileName);
            $data['image2']= $fileName;
        }

        if($request->image3){
            $fileName = rand().time().'.'.$request->image3->getClientOriginalExtension();
            $request->image3->move(base_path('public/images/products'), $fileName);
            $data['image3']= $fileName;
        }

        // if($request->meta_image){
        //     $fileName = 'images/products/meta_image/'.rand().time().'.'.$request->meta_image->getClientOriginalExtension();
        //     $request->photo->move(base_path('public/images/products/meta_image'), $fileName);
        //     $data['meta_image']= $fileName;
        // }

        $data['is_featured']=$request->input('is_featured',0);
        $size=$request->input('size');
        if($size)
        {
            $data['size']=implode(',',$size);
        }
        else
        {
            $data['size']='';
        }
        // return $data;
        $status=$product->fill($data)->save();

        //Application
        // if(@$data['applications'] && count($data['applications'])){
        //     $product->applications()->sync($data['applications']);
        // }

            //Attributes
        if(@$data['attributes'] && count($data['attributes'])){
            $product->attributes()->sync($data['attributes']);
        }

            //Characteristics
        // if(@$data['characteristics'] && count($data['characteristics'])){
        //     $product->characteristics()->sync($data['characteristics']);
        // }

            //Features
        if(@$data['features'] && count($data['features'])){
            $product->features()->sync($data['features']);
        }

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

        if($status)
        {
            request()->session()->flash('success','Product Successfully updated');
        }
        else
        {
            request()->session()->flash('error','Please try again!!');
        }

        return redirect()->route('product.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
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
}
