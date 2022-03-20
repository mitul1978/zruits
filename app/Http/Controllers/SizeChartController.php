<?php

namespace App\Http\Controllers;

use App\Models\SizeChart;
use Illuminate\Http\Request;

class SizeChartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $sizesCharts =  SizeChart::paginate(50);
       return view('backend.sizescharts.index')->with('sizesCharts',$sizesCharts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.sizescharts.create');
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
        if($request->image)
        {
            $fileName = 'images/charts/'.rand().time().'.'.$request->image->getClientOriginalExtension();
            $request->image->move(public_path('/images/charts/'), $fileName);
            $data['image']= $fileName;
        }       
        SizeChart::create($data);
        request()->session()->flash('success','Size Chart Successfully Uploaded');
        return redirect()->route('sizecharts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\State  $state
     * @return \Illuminate\Http\Response
     */
    // public function show(Color $color)
    // {
    //     //
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\State  $state
     * @return \Illuminate\Http\Response
     */
    public function edit(SizeChart $sizeChart,$id)
    { 
        $sizeChart = SizeChart::find($id);
        return view('backend.sizescharts.edit',compact('sizeChart'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\State  $state
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();
        $sizeChart=SizeChart::findOrFail($id);   

        if($request->image)
        {
            $fileName = 'images/charts/'.rand().time().'.'.$request->image->getClientOriginalExtension();
            $request->image->move(public_path('/images/charts/'), $fileName);
            $data['image']= $fileName;
        }   

        $sizeChart->update($data);
        request()->session()->flash('success','Size Chart Successfully updated');
        return redirect()->route('sizecharts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\State  $state
     * @return \Illuminate\Http\Response
     */
    public function destroy(SizeChart $sizeChart)
    {
        $sizeChart=SizeChart::findOrFail($sizeChart->id);
        $status=$sizeChart->delete();

        if($status){
            request()->session()->flash('success','Size Chart successfully deleted');
        }
        else
        {
            request()->session()->flash('error','Error while deleting size chart');
        }
        return redirect()->route('sizecharts.index');
    }
}
