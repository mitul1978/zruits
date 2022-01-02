<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Laminate;

class LaminatesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $laminates=Laminate::latest()->paginate(15);
        // return $category;
        return view('backend.laminate.index')->with('laminates',$laminates);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('backend.laminate.create');
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
            $fileName = 'images/laminate/'.rand().time().'.'.$request->icon_tag->getClientOriginalExtension();
            $request->icon_tag->move(base_path('public/images/laminate/'), $fileName);
            $data['icon_tag']= $fileName;
        }


        $status=Laminate::create($data);
        if($status){
            request()->session()->flash('success','Laminates successfully added');
        }
        else{
            request()->session()->flash('error','Error occurred, Please try again!');
        }
        return redirect()->route('laminate.index');


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
        $laminate=Laminate::findOrFail($id);
        return view('backend.laminate.edit')->with('laminate',$laminate);
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
        $laminate=Laminate::findOrFail($id);
        $this->validate($request,[
            'name'=>'string|required',
            'status'=>'required|in:0,1',
        ]);
        $data= $request->all();

        // return $data;
        if(@$request->icon_tag){

            $fileName = 'images/laminate/'.rand().time().'.'.$request->icon_tag->getClientOriginalExtension();
            $request->icon_tag->move(base_path('public/images/laminate/'), $fileName);
            $data['icon_tag']= $fileName;
        }

        $status=$laminate->update($data);
        if($status){
            request()->session()->flash('success','Laminate successfully updated');
        }
        else{
            request()->session()->flash('error','Error occurred, Please try again!');
        }
        return redirect()->route('laminate.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $laminate=Laminate::findOrFail($id);

        if($laminate){
            $laminate->delete();

            request()->session()->flash('success','Laminate successfully deleted');
        }
        else{
            request()->session()->flash('error','Error while deleting Laminate');
        }
        return redirect()->route('laminate.index');
    }

}
