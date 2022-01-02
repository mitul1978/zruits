<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Thickness;

class ThicknessController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $thicknesses=Thickness::latest()->paginate(15);
        // return $category;
        return view('backend.thickness.index')->with('thicknesses',$thicknesses);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('backend.thickness.create');
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
            'thickness'=>'string|required',
            'name'=>'string|required',
            'status'=>'required|in:1,0'
        ]);
        $data= $request->all();


        // return $data;

        if(@$request->icon_tag){
            $fileName = 'images/thickness/'.rand().time().'.'.$request->icon_tag->getClientOriginalExtension();
            $request->icon_tag->move(base_path('public/images/thickness/'), $fileName);
            $data['icon_tag']= $fileName;
        }


        $status=Thickness::create($data);
        if($status){
            request()->session()->flash('success','Thickness successfully added');
        }
        else{
            request()->session()->flash('error','Error occurred, Please try again!');
        }
        return redirect()->route('thickness.index');


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
        $thickness=Thickness::findOrFail($id);
        return view('backend.thickness.edit')->with('thickness',$thickness);
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
        $thickness=Thickness::findOrFail($id);
        $this->validate($request,[
            'thickness'=>'string|required',
            'name'=>'string|required',
            'status'=>'required|in:1,0'
        ]);
        $data= $request->all();

        if(@$request->icon_tag){
            $fileName = 'images/thickness/'.rand().time().'.'.$request->icon_tag->getClientOriginalExtension();
            $request->icon_tag->move(base_path('public/images/thickness/'), $fileName);
            $data['icon_tag']= $fileName;
        }


        $status=$thickness->update($data);
        if($status){
            request()->session()->flash('success','Thickness successfully updated');
        }
        else{
            request()->session()->flash('error','Error occurred, Please try again!');
        }
        return redirect()->route('thickness.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $thickness=Thickness::findOrFail($id);

        if($thickness){
            $thickness->delete();

            request()->session()->flash('success','Thickness successfully deleted');
        }
        else{
            request()->session()->flash('error','Error while deleting Thickness');
        }
        return redirect()->route('thickness.index');
    }

}
