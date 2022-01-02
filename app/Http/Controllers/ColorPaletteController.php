<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ColorPalette;
use App\Models\ColorPaletteDesign;
use App\Models\Product;

use DB;
class ColorPaletteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $color_palettes=ColorPalette::latest()->paginate(15);
        // return $category;
        return view('backend.color-palette.index')->with('color_palettes',$color_palettes);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

       $color_palette_designs =  ColorPaletteDesign::where('status',1)->pluck('design','id');

    //    $products = Product::select(DB::raw('CONCAT(name, " - ", design) AS name, id'))->where('status', 1)->orderBy('name')->pluck('name', 'id');
       $products = Product::where('status', 1)->orderBy('name')->pluck('name', 'id');


        return view('backend.color-palette.create',compact('color_palette_designs','products'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request->all();
        $this->validate($request,[
            'name'=>'string|required',
            'status'=>'required|in:1,0',
        ]);
        $data= $request->all();


        $status=ColorPalette::create( $data);

        if(@$data['products'] && count($data['products'])){

            foreach( $data['products'] as $key => $product_id){

                $extra_atr =[
                    'sort_order'=>@$data['sort_order'][$key] ? $data['sort_order'][$key] :null,
                    'status'=>@$data['product_status'][$key] ? $data['product_status'][$key] : 1,
                ];

                $status->products()->attach($product_id,$extra_atr);
            }
        }

        if($status){
            request()->session()->flash('success','color palette successfully added');
        }
        else{
            request()->session()->flash('error','Error occurred, Please try again!');
        }
        return redirect()->route('color-palette.index');


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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

       $color_palette_designs =  ColorPaletteDesign::where('status',1)->pluck('design','id');

        $color_palette=ColorPalette::findOrFail($id);
        $products = Product::where('status', 1)->orderBy('name')->pluck('name', 'id');

        return view('backend.color-palette.edit',compact('color_palette_designs','color_palette','products'));
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
        // return $request->all();
        $color_palette=ColorPalette::findOrFail($id);
        $this->validate($request,[
            'name'=>'string|required',
            'status'=>'required|in:1,0',
        ]);
        $data= $request->all();




        $status=$color_palette->update($data);
        $color_palette->products()->detach();

        if(@$data['products'] && count($data['products'])){

            foreach( $data['products'] as $key => $product_id){

                $extra_atr =[
                    'sort_order'=>@$data['sort_order'][$key] ? $data['sort_order'][$key] :null,
                    'status'=>@$data['product_status'][$key],
                ];

                $color_palette->products()->attach($product_id,$extra_atr);

            }
        }



        if($status){
            request()->session()->flash('success','color palette successfully updated');
        }
        else{
            request()->session()->flash('error','Error occurred, Please try again!');
        }
        return redirect()->route('color-palette.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $color_palette=ColorPalette::findOrFail($id);

        if($color_palette){
            $color_palette->delete();

            request()->session()->flash('success','color palette successfully deleted');
        }
        else{
            request()->session()->flash('error','Error while deleting color_palette');
        }
        return redirect()->route('color-palette.index');
    }

}
