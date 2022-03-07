<?php

namespace App\Http\Controllers;

use App\Models\Fabric;
use Illuminate\Http\Request;

class FabricController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $fabrics =  Fabric::where('status',1)->orderBy('name')->paginate(50);
       return view('backend.fabrics.index')->with('fabrics',$fabrics);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.fabrics.create');
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
        Fabric::create($data);
        request()->session()->flash('success','Fabric Successfully created');
        return redirect()->route('fabrics.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\State  $state
     * @return \Illuminate\Http\Response
     */
    public function show(Fabric $fabric)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\State  $state
     * @return \Illuminate\Http\Response
     */
    public function edit(Fabric $fabric)
    { 
        $fabric = Fabric::find($fabric->id);
        return view('backend.fabrics.edit',compact('fabric'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\State  $state
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Fabric $fabric)
    {   
        $data = $request->all();
        $fabric=Fabric::findOrFail($fabric->id);        
        $fabric->update($data);
        request()->session()->flash('success','Fabric Successfully updated');
        return redirect()->route('fabrics.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\State  $state
     * @return \Illuminate\Http\Response
     */
    public function destroy(Fabric $fabric)
    {
        $fabric=Fabric::findOrFail($fabric->id);
        $status=$fabric->delete();

        if($status){
            request()->session()->flash('success','Fabric successfully deleted');
        }
        else{
            request()->session()->flash('error','Error while deleting Fabric');
        }
        return redirect()->route('fabrics.index');
    }
}
