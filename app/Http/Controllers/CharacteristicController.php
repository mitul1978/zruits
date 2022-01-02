<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Characteristic;

class CharacteristicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $characteristics=Characteristic::latest()->paginate(15);
        // return $category;
        return view('backend.characteristic.index')->with('characteristics',$characteristics);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('backend.characteristic.create');
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
            'status'=>'required|in:1,0'
        ]);
        $data= $request->all();


        // return $data;

        if(@$request->icon){
            $fileName = 'images/characteristic/'.rand().time().'.'.$request->icon->getClientOriginalExtension();
            $request->icon->move(base_path('public/images/characteristic/'), $fileName);
            $data['icon']= $fileName;
        }


        $status=Characteristic::create($data);
        if($status){
            request()->session()->flash('success','Characteristics successfully added');
        }
        else{
            request()->session()->flash('error','Error occurred, Please try again!');
        }
        return redirect()->route('characteristic.index');


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
        $characteristic=Characteristic::findOrFail($id);
        return view('backend.characteristic.edit')->with('characteristic',$characteristic);
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
        $characteristic=Characteristic::findOrFail($id);
        $this->validate($request,[
            'name'=>'string|required',
            'status'=>'required|in:1,0'
        ]);
        $data= $request->all();

        if(@$request->icon){
            $fileName = 'images/characteristic/'.rand().time().'.'.$request->icon->getClientOriginalExtension();
            $request->icon->move(base_path('public/images/characteristic/'), $fileName);
            $data['icon']= $fileName;
        }


        $status=$characteristic->update($data);
        if($status){
            request()->session()->flash('success','Characteristic successfully updated');
        }
        else{
            request()->session()->flash('error','Error occurred, Please try again!');
        }
        return redirect()->route('characteristic.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $characteristic=Characteristic::findOrFail($id);

        if($characteristic){
            $characteristic->delete();

            request()->session()->flash('success','Characteristic successfully deleted');
        }
        else{
            request()->session()->flash('error','Error while deleting Characteristics');
        }
        return redirect()->route('characteristic.index');
    }

}
