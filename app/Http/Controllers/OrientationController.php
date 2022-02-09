<?php

namespace App\Http\Controllers;

use App\Models\Orientation;
use Illuminate\Http\Request;

class OrientationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $orientations =  Orientation::where('status',1)->orderBy('name')->paginate(50);
       return view('backend.orientations.index')->with('orientations',$orientations);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.orientations.create');
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
        Orientation::create($data);
        request()->session()->flash('success','Orientation Successfully created');
        return redirect()->route('orientations.index');
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
    public function edit(Orientation $orientation)
    { 
        $orientation = Orientation::find($orientation->id);
        return view('backend.orientations.edit',compact('orientation'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\State  $state
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Orientation $orientation)
    {   
        $data = $request->all();
        $orientation=Orientation::findOrFail($orientation->id);        
        $orientation->update($data);
        request()->session()->flash('success','Orientation Successfully updated');
        return redirect()->route('orientations.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\State  $state
     * @return \Illuminate\Http\Response
     */
    public function destroy(Orientation $orientation)
    {
        $orientation=Orientation::findOrFail($orientation->id);
        $status=$orientation->delete();

        if($status){
            request()->session()->flash('success','Orientation successfully deleted');
        }
        else
        {
            request()->session()->flash('error','Error while deleting Orientation');
        }
        return redirect()->route('orientations.index');
    }
}
