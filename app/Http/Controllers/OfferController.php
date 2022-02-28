<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Offer;
use Illuminate\Support\Str;

class OfferController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $offers=Offer::paginate(10);
        // return $category;
        return view('backend.offers.index')->with('offers',$offers);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $parent_cats=Offer::where('is_parent',1)->orderBy('title','ASC')->get();
        return view('backend.offers.create');
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
            'offer_type'=>'required',
            'offer_value'=>'required',
            'status'=>'required'
        ]);

        $data= $request->all();


        $status=Offer::create($data);
        if($status)
        {
            request()->session()->flash('success','Offer successfully added');
        }
        else
        {
            request()->session()->flash('error','Error occurred, Please try again!');
        }

        return redirect()->route('offer.index');
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
        // $parent_cats=Offer::where('is_parent',1)->get();
        $offer=Offer::findOrFail($id);
        return view('backend.offers.edit')->with('offer',$offer);
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
        try{
            // dd($request);
            // return $request->all();
            $offer=Offer::findOrFail($id);
            $this->validate($request,[
                'name'=>'string|required',
                'offer_type'=>'required',
                'offer_value'=>'required',
                'status'=>'required'
            ]);

            $data= $request->all();

            $status=$offer->update($data);
    
            if($status)
            {
                request()->session()->flash('success','Offer successfully updated');
            }
            else
            {
                request()->session()->flash('error','Error occurred, Please try again!');
            }
        }
        catch(exception $e)
        {
            dd($e);
        }    

        return redirect()->route('offer.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $offer=Offer::findOrFail($id);
        // $child_cat_id=Category::where('parent_id',$id)->pluck('id');
        // return $child_cat_id;
        $status=$offer->delete();

        if($status){
            // if(count($child_cat_id)>0){
            //     Category::shiftChild($child_cat_id);
            // }
            request()->session()->flash('success','Offer successfully deleted');
        }
        else{
            request()->session()->flash('error','Error while deleting offer');
        }
        return redirect()->route('offers.index');
    }

    // public function getChildByParent(Request $request){
    //     // return $request->all();
    //     $category=Category::findOrFail($request->id);
    //     $child_cat=Category::getChildByParentID($request->id);
    //     // return $child_cat;
    //     if(count($child_cat)<=0){
    //         return response()->json(['status'=>false,'msg'=>'','data'=>null]);
    //     }
    //     else{
    //         return response()->json(['status'=>true,'msg'=>'','data'=>$child_cat]);
    //     }
    // }
}
