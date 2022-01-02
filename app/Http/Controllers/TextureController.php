<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Texture;

class TextureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $textures=Texture::latest()->paginate(15);
        // return $category;
        return view('backend.texture.index')->with('textures',$textures);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('backend.texture.create');
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
            $fileName = 'images/texture/'.rand().time().'.'.$request->icon_tag->getClientOriginalExtension();
            $request->icon_tag->move(base_path('public/images/texture/'), $fileName);
            $data['icon_tag']= $fileName;
        }


        $status=Texture::create($data);
        if($status){
            request()->session()->flash('success','Texture successfully added');
        }
        else{
            request()->session()->flash('error','Error occurred, Please try again!');
        }
        return redirect()->route('texture.index');


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
        $texture=Texture::findOrFail($id);
        return view('backend.texture.edit')->with('texture',$texture);
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
        $texture=Texture::findOrFail($id);
        $this->validate($request,[
            'name'=>'string|required',
            'status'=>'required|in:0,1',
        ]);
        $data= $request->all();

        // return $data;
        if(@$request->icon_tag){

            $fileName = 'images/texture/'.rand().time().'.'.$request->icon_tag->getClientOriginalExtension();
            $request->icon_tag->move(base_path('public/images/texture/'), $fileName);
            $data['icon_tag']= $fileName;
        }

        $status=$texture->update($data);
        if($status){
            request()->session()->flash('success','Texture successfully updated');
        }
        else{
            request()->session()->flash('error','Error occurred, Please try again!');
        }
        return redirect()->route('texture.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $texture=Texture::findOrFail($id);

        if($texture){
            $texture->delete();

            request()->session()->flash('success','Texture successfully deleted');
        }
        else{
            request()->session()->flash('error','Error while deleting Texture');
        }
        return redirect()->route('texture.index');
    }

}
