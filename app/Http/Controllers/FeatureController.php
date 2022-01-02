<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Feature;

class FeatureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $features=Feature::latest()->paginate(15);
        // return $category;
        return view('backend.feature.index')->with('features',$features);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('backend.feature.create');
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
            'content'=>'string|required',
            'status'=>'required|in:1,0',
            'sort_order'=>'required'
        ]);
        $data= $request->all();


        // return $data;

        if(@$request->icon){
            $fileName = 'images/feature/'.rand().time().'.'.$request->icon->getClientOriginalExtension();
            $request->icon->move(base_path('public/images/feature/'), $fileName);
            $data['icon']= $fileName;
        }


        $status=Feature::create($data);
        if($status){
            request()->session()->flash('success','Feature successfully added');
        }
        else{
            request()->session()->flash('error','Error occurred, Please try again!');
        }
        return redirect()->route('feature.index');


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
        $feature=Feature::findOrFail($id);
        return view('backend.feature.edit')->with('feature',$feature);
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
        $feature=Feature::findOrFail($id);
        $this->validate($request,[
            'name'=>'string|required',
            'content'=>'string|required',
            'status'=>'required|in:1,0',
            'sort_order'=>'required'
        ]);
        $data= $request->all();

        if(@$request->icon){
            $fileName = 'images/feature/'.rand().time().'.'.$request->icon->getClientOriginalExtension();
            $request->icon->move(base_path('public/images/feature/'), $fileName);
            $data['icon']= $fileName;
        }


        $status=$feature->update($data);
        if($status){
            request()->session()->flash('success','Feature successfully updated');
        }
        else{
            request()->session()->flash('error','Error occurred, Please try again!');
        }
        return redirect()->route('feature.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $feature=Feature::findOrFail($id);

        if($feature){
            $feature->delete();

            request()->session()->flash('success','Feature successfully deleted');
        }
        else{
            request()->session()->flash('error','Error while deleting Feature');
        }
        return redirect()->route('feature.index');
    }

}
