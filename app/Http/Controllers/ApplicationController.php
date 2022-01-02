<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Application;

class ApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $application=Application::latest()->paginate(15);
        // return $category;
        return view('backend.application.index')->with('applications',$application);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('backend.application.create');
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

        // dd( $data);

        // return $data;
        if(@$request->icon_tag){
            $fileName = 'images/application/'.rand().time().'.'.$request->icon_tag->getClientOriginalExtension();
            $request->icon_tag->move(base_path('public/images/application/'), $fileName);
            $data['icon_tag']= $fileName;
        }


        $status=Application::create($data);
        if($status){
            request()->session()->flash('success','Application successfully added');
        }
        else{
            request()->session()->flash('error','Error occurred, Please try again!');
        }
        return redirect()->route('application.index');


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
        $application=Application::findOrFail($id);
        return view('backend.application.edit')->with('application',$application);
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
        $application=Application::findOrFail($id);
        $this->validate($request,[
            'name'=>'string|required',
            'status'=>'required|in:0,1',
        ]);
        $data= $request->all();

        // return $data;
        if(@$request->icon_tag){

            $fileName = 'images/application/'.rand().time().'.'.$request->icon_tag->getClientOriginalExtension();
            $request->icon_tag->move(base_path('public/images/application/'), $fileName);
            $data['icon_tag']= $fileName;
        }

        $status=$application->update($data);
        if($status){
            request()->session()->flash('success','Application successfully updated');
        }
        else{
            request()->session()->flash('error','Error occurred, Please try again!');
        }
        return redirect()->route('application.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $application=Application::findOrFail($id);

        if($application){
            $application->delete();

            request()->session()->flash('success','Application successfully deleted');
        }
        else{
            request()->session()->flash('error','Error while deleting Application');
        }
        return redirect()->route('application.index');
    }

}
