<?php

namespace App\Http\Controllers\Distributor;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

use App\Models\Distributor\Dealer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\State;
use App\Models\City;
use Str;

class DealerController extends Controller

{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $users=Dealer::where('distributor_id',Auth::guard('distributor')->user()->id)->orderBy('id','ASC')->paginate(10);

        return view('distributor.dealer.index')->with('users',$users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {


        $states = State::where('status',1)->orderBy('name')->pluck('name','id');


        return view('distributor.dealer.create',compact('states'));
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
            'email'=>'string|required|unique:dealers',
            'mobile'=>'string|required|unique:dealers|max:10|min:10',
            // 'password'=>'string|required',
            'status'=>'required|in:1,0',
            // 'pancard_no'=>'string|required|max:10|min:10|unique:dealers',
            // 'pincode'=>'string|required|max:6|min:6',
            // 'gst_no'=>'string|required|max:15|min:15|unique:dealers',
            'address'=>'required',
            'city_id'=>'required',
            'state_id'=>'required',
            'authorised_person_name'=>'required',

        ]);
        $data=$request->all();


        if(@$request->photo){
            $fileName = Str::slug($request->name).time().'.'.$request->photo->getClientOriginalExtension();
            $request->photo->move(public_path('/images/dealers/'), $fileName);
            $data['photo']= $fileName;
        }


        // $data['password']=Hash::make($request->password);

        $data['distributor_id']=Auth::guard('distributor')->user()->id;
        // dd($data);
        $status=Dealer::create($data);
        // dd($status);
        if($status){
            request()->session()->flash('success','Successfully added Dealer');
        }
        else{
            request()->session()->flash('error','Error occurred while adding user');
        }
        return redirect()->route('dealer.index');

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
        $user=Dealer::findOrFail($id);
        $states = State::where('status',1)->orderBy('name')->pluck('name','id');
        $cities = City::where('status',1)->where(['state_id'=>$user->state_id])->orderBy('name')->pluck('name','id');

        return view('distributor.dealer.edit',compact('states','cities','user'));
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
        $user=Dealer::findOrFail($id);
        $data=$request->all();

        $this->validate($request,
        [
            'name'=>'string|required|max:30',
            'email'=>'string|required|unique:dealers,email,'.$id,
            'mobile'=>'string|max:10|min:10|required|unique:dealers,mobile,'.$id,
            // 'password'=>'string|required',
            'status'=>'required|in:1,0',
            // 'pancard_no'=>'string|required|max:10|min:10|unique:dealers,pancard_no,'.$id,
            // 'pincode'=>'string|required|max:6|min:6',
            // 'gst_no'=>'string|required|max:15|min:15|unique:dealers,gst_no,'.$id,
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
            $request->photo->move(public_path('/images/dealers/'), $fileName);
            $data['photo']= $fileName;
        }
        $data['distributor_id']=Auth::guard('distributor')->user()->id;

        $status=$user->fill($data)->save();
        if($status){
            request()->session()->flash('success','Dealer Successfully updated');
        }
        else{
            request()->session()->flash('error','Error occured while updating');
        }
        return redirect()->route('dealer.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete=Dealer::findorFail($id);
        $status=$delete->delete();
        if($status){
            request()->session()->flash('success','Dealer Successfully deleted');
        }
        else{
            request()->session()->flash('error','There is an error while deleting dealers');
        }
        return redirect()->route('dealer.index');
    }
}


