<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\User;
use Str;
use Illuminate\Support\Facades\Mail;
use Alert;
use App\Exports\UsersExport;
// use App\Imports\UsersImport;
use Maatwebsite\Excel\Facades\Excel;
class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users=User::where('role','user')->orderBy('id','ASC')->paginate(10);
        return view('backend.users.index')->with('users',$users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.users.create');
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
            'email'=>'string|required|unique:users',
            'password'=>'string|required',
            'role'=>'required|in:admin,user',
            'status'=>'required|in:active,inactive',
        ]);
        // dd($request->all());
        $data=$request->all();
        $data['password']=Hash::make($request->password);
        // dd($data);


        if(@$request->photo){
            $fileName = Str::slug($request->name).time().'.'.$request->photo->getClientOriginalExtension();
            $request->photo->move(public_path('/images/users/'), $fileName);
            $data['photo']= $fileName;
        }


        $status=User::create($data);
        // dd($status);
        if($status){
            request()->session()->flash('success','Successfully added user');
        }
        else{
            request()->session()->flash('error','Error occurred while adding user');
        }
        return redirect()->route('users.index');

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
        $user=User::findOrFail($id);
        return view('backend.users.edit')->with('user',$user);
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
        $user=User::findOrFail($id);
        $this->validate($request,
        [
            'name'=>'string|required|max:30',
            'email'=>'string|required',
            'role'=>'required|in:admin,user',
            'status'=>'required|in:active,inactive',
        ]);
        // dd($request->all());
        $data=$request->all();
        // dd($data);



        if(@$request->photo){
            $fileName =Str::slug($request->name).time().'.'.$request->photo->getClientOriginalExtension();
            $request->photo->move(base_path('public/images/users/'), $fileName);
            $data['photo']= $fileName;
        }


        $status=$user->fill($data)->save();
        if($status){
            request()->session()->flash('success','Successfully updated');
        }
        else{
            request()->session()->flash('error','Error occured while updating');
        }
        return redirect()->route('users.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete=User::findorFail($id);
        $status=$delete->delete();
        if($status){
            request()->session()->flash('success','User Successfully deleted');
        }
        else{
            request()->session()->flash('error','There is an error while deleting users');
        }
        return redirect()->route('users.index');
    }

    public function resetPassword(Request $request){
        $request->validate([
            'email' => ['required'],
            'password' => ['required'],
            'password_confirmation' => ['same:password'],
        ]);

        User::where('email',$request->email)->update(['password'=> Hash::make($request->password)]);
         
        $user = User::where('email',$request->email)->first();
        $email = $user->email;
        
        Mail::send('mail.password-change-cus', ['user' => $user], function ($message) use ($email) {
            $message->to($email);
            $message->subject('Password Changed');
        });
       
        Alert::success("Password changed successfully");

        if($user->role == 'user')
        {  
            return view('frontend.login');
        }
        else
        {
            return view('auth.login');
        }
    }

    public function export(){
        return Excel::download(new UsersExport, 'UsersData.xlsx');
    }
}
