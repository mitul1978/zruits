<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Settings;
use App\User;
use App\Rules\MatchOldPassword;
use Hash;
use Carbon\Carbon;
use App\Models\Order;
use App\Models\OrderProductList;
use App\Models\Category;
use App\Models\Product;
use Spatie\Activitylog\Models\Activity;
class AdminController extends Controller
{
    public function index()
    {
        // $data = User::select(\DB::raw("COUNT(*) as count"), \DB::raw("DAYNAME(created_at) as day_name"), \DB::raw("DAY(created_at) as day"))
        // ->where('created_at', '>', Carbon::today()->subDay(6))
        // ->groupBy('day_name','day')
        // ->orderBy('day')
        // ->get();
        // $array[] = ['Name', 'Number'];
        // foreach($data as $key => $value)
        // {
        //    $array[++$key] = [$value->day_name, $value->count];
        // }
        // dd($array);
        //  return $data;

        $cumulativeSales  = Order::where('payment_status','paid')->sum('total_amount');
        $totalUsers = User::where('role','user')->count();
        $lastFiveOrderSales = Order::where('payment_status','paid')->latest()->take(5)->get()->sum('total_amount');
        $orderList = Order::where('payment_status','paid')->pluck('id')->toArray();
        $totalStockSold = OrderProductList::whereIn('order_id',$orderList)->get()->sum('quantity');
        // $lastFiveCategory = Order::whre('')
        $lastSevenDaysSales = Order::where('payment_status','paid')->whereDate('created_at', '>=', date('Y-m-d', strtotime("-7 days")))->whereDate('created_at','<=',date('Y-m-d'))->sum('total_amount');
        $lastFourteenDaysSales = Order::where('payment_status','paid')->whereDate('created_at', '>=', date('Y-m-d', strtotime("-14 days")))->whereDate('created_at','<=',date('Y-m-d'))->sum('total_amount');
        $lastThirtyDaysSales = Order::where('payment_status','paid')->whereDate('created_at', '>=', date('Y-m-d', strtotime("-30 days")))->whereDate('created_at','<=',date('Y-m-d'))->sum('total_amount');
        $lastSixtyDaysSales = Order::where('payment_status','paid')->whereDate('created_at', '>=', date('Y-m-d', strtotime("-60 days")))->whereDate('created_at','<=',date('Y-m-d'))->sum('total_amount');
        $lastNintyDaysSales = Order::where('payment_status','paid')->whereDate('created_at', '>=', date('Y-m-d', strtotime("-90 days")))->whereDate('created_at','<=',date('Y-m-d'))->sum('total_amount');
        $totalCategories = Category::where('status',1)->count();
        $totalProducts = Product::where('status',1)->count();
        $totalOrders  = Order::where('payment_status','paid')->count();
        $allCategories = Category::where('status',1)->get();
     return view('backend.index',compact('cumulativeSales','totalUsers','lastFiveOrderSales','totalStockSold','lastSevenDaysSales','lastThirtyDaysSales','lastFourteenDaysSales','lastSixtyDaysSales','lastNintyDaysSales','totalCategories','totalProducts','totalOrders','allCategories'));
    }

    public function profile(){
        $profile=Auth()->user();
        // return $profile;
        return view('backend.users.profile')->with('profile',$profile);
    }

    public function profileUpdate(Request $request,$id){
        // return $request->all();
        $user=User::findOrFail($id);
        $data=$request->all();
        $status=$user->fill($data)->save();
        if($status){
            request()->session()->flash('success','Successfully updated your profile');
        }
        else{
            request()->session()->flash('error','Please try again!');
        }
        return redirect()->back();
    }

    public function settings(){
        $settings=Settings::get();
        return view('backend.setting',compact('settings'));
    }

    public function settingsUpdate(Request $request){
   
        $data=$request->except('_token');


        $request->validate([
            'minimum_bundle_qty'=>'required'
        ]);

        foreach($data as $name=> $value){

        $setting=Settings::where('name',$name)->first();

        if($setting)
            $setting->update(['value'=>$value]);

        }
   
        request()->session()->flash('success','Setting successfully updated');
        return redirect()->back();
    }
      

    public function changePassword(){
        return view('backend.layouts.changePassword');
    }
    public function changPasswordStore(Request $request)
    {
        $request->validate([
            'current_password' => ['required', new MatchOldPassword],
            'new_password' => ['required'],
            'new_confirm_password' => ['same:new_password'],
        ]);
   
        User::find(auth()->user()->id)->update(['password'=> Hash::make($request->new_password)]);
   
        return redirect()->route('admin')->with('success','Password successfully changed');
    }

    // Pie chart
    public function userPieChart(Request $request){
        // dd($request->all());
        $data = User::select(\DB::raw("COUNT(*) as count"), \DB::raw("DAYNAME(created_at) as day_name"), \DB::raw("DAY(created_at) as day"))
        ->where('created_at', '>', Carbon::today()->subDay(6))
        ->groupBy('day_name','day')
        ->orderBy('day')
        ->get();
     $array[] = ['Name', 'Number'];
     foreach($data as $key => $value)
     {
       $array[++$key] = [$value->day_name, $value->count];
     }
    //  return $data;
     return view('backend.index')->with('course', json_encode($array));
    }

    // public function activity(){
    //     return Activity::all();
    //     $activity= Activity::all();
    //     return view('backend.layouts.activity')->with('activities',$activity);
    // }
}
