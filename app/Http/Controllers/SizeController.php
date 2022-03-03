<?php

namespace App\Http\Controllers;

use App\Models\Size;
use Illuminate\Http\Request;

class SizeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $sizes =  Size::orderBy('name')->paginate(50);
       return view('backend.sizes.index')->with('sizes',$sizes);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.sizes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $data = $request->all();       
        Size::create($data);
        request()->session()->flash('success','Size Successfully created');
        return redirect()->route('sizes.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\State  $state
     * @return \Illuminate\Http\Response
     */
    public function show(Color $color)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\State  $state
     * @return \Illuminate\Http\Response
     */
    public function edit(Size $size)
    { 
        $size = Size::find($size->id);
        return view('backend.sizes.edit',compact('size'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\State  $state
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Size $size)
    {   
        $data = $request->all();
        $size=Size::findOrFail($size->id);        
        $size->update($data);
        request()->session()->flash('success','Size Successfully updated');
        return redirect()->route('sizes.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\State  $state
     * @return \Illuminate\Http\Response
     */
    public function destroy(Size $size)
    {
        $size=Size::findOrFail($size->id);
        $status=$size->delete();

        if($status){
            request()->session()->flash('success','Size successfully deleted');
        }
        else{
            request()->session()->flash('error','Error while deleting size');
        }
        return redirect()->route('sizes.index');
    }
}
