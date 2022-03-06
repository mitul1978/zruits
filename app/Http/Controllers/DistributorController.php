<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\Distributor\Distributor;
use App\Models\City;
use App\Models\State;
use Str;

class DistributorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $users=Distributor::orderBy('id','ASC')->paginate(10);
        return view('backend.distributor.index')->with('users',$users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {


        $states = State::where('status',1)->orderBy('name')->pluck('name','id');


        return view('backend.distributor.create',compact('states'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request,
        [
            'name'=>'string|required|max:30',
            'email'=>'string|required|unique:distributors',
            'mobile'=>'string|required|unique:distributors|max:10|min:10',
            'password'=>'string|required',
            'status'=>'required|in:1,0',
            'pancard_no'=>'string|required|max:10|min:10|unique:distributors',
            'pincode'=>'string|required|max:6|min:6',
            'gst_no'=>'string|required|max:15|min:15|unique:distributors',
            'address'=>'required',
            'city_id'=>'required',
            'state_id'=>'required',
            'authorised_person_name'=>'required',

        ]);
        $data=$request->all();


        if(@$request->photo){
            $fileName = Str::slug($request->name).time().'.'.$request->photo->getClientOriginalExtension();
            $request->photo->move(public_path('/images/distributors/'), $fileName);
            $data['photo']= $fileName;
        }


        $data['password']=Hash::make($request->password);
        // dd($data);
        $status=Distributor::create($data);
        // dd($status);
        if($status){
            request()->session()->flash('success','Successfully added Distributor');
        }
        else{
            request()->session()->flash('error','Error occurred while adding user');
        }
        return redirect()->route('distributor.index');

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
        $user=Distributor::findOrFail($id);
        $states = State::where('status',1)->orderBy('name')->pluck('name','id');
        $cities = City::where('status',1)->orderBy('name')->pluck('name','id');

        return view('backend.distributor.edit',compact('states','cities','user'));
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
        $user=Distributor::findOrFail($id);
        $data=$request->all();

        $this->validate($request,
        [
            'name'=>'string|required|max:30',
            'email'=>'string|required|unique:distributors,email,'.$id,
            'mobile'=>'string|required|max:10|min:10|unique:distributors,mobile,'.$id,
            'status'=>'required|in:1,0',
            'pancard_no'=>'string|required|max:10|min:10|unique:distributors,pancard_no,'.$id,
            'pincode'=>'string|required|max:6|min:6',
            'gst_no'=>'string|required|max:15|min:15|unique:distributors,gst_no,'.$id,
            'address'=>'required',
            'city_id'=>'required',
            'state_id'=>'required',
            'authorised_person_name'=>'required',
        ]);
        // dd($request->all());
        $data=$request->all();
        // dd($data);


        if(@$request->photo){
            $fileName = rand().time().'.'.$request->photo->getClientOriginalExtension();
            $request->photo->move(public_path('/images/distributors/'), $fileName);
            $data['photo']= $fileName;
        }

        $status=$user->fill($data)->save();
        if($status){
            request()->session()->flash('success','Distributor Successfully updated');
        }
        else{
            request()->session()->flash('error','Error occured while updating');
        }
        return redirect()->route('distributor.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete=Distributor::findorFail($id);
        $status=$delete->delete();
        if($status){
            request()->session()->flash('success','Distributor Successfully deleted');
        }
        else{
            request()->session()->flash('error','There is an error while deleting distributor');
        }
        return redirect()->route('distributor.index');
    }
}
