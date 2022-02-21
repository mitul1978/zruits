<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\Coupon;
use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Distributor\Dealer;
use Auth;


class CouponController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $coupon=Coupon::where('is_giftcard',0)->paginate('10');
        return view('backend.coupon.index')->with('coupons',$coupon);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //$dealers =  Dealer::where('distributor_id',Auth::guard('distributor')->user()->id)->where('status',1)->pluck('name','id');
        return view('backend.coupon.create');
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
            'code'=>'string|required',
            'max_use'=>'integer|required',
            'type'=>'required|in:fixed,percent',
            'value'=>'required|numeric',
            'start_date'=>'required',
            'end_date'=>'required',
            'status'=>'required'
        ]);

        $data=$request->all();

       // $data['distributor_id']=Auth::guard('distributor')->user()->id;

        $status=Coupon::create($data);
        if($status)
        {
            request()->session()->flash('success','Coupon Successfully added');
        }
        else
        {
            request()->session()->flash('error','Please try again!!');
        }
        return redirect()->route('coupon.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //$dealers =  Dealer::where('status',1)->pluck('name','id');
        $coupon=Coupon::find($id);
        if($coupon)
        {
            return view('backend.coupon.edit',compact('coupon'));
        }
        else
        {
            return view('admin.coupon.index')->with('error','Coupon not found');
        }
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
        $coupon=Coupon::find($id);
        $this->validate($request,[
            'name'=>'string|required',
            'code'=>'string|required',
            'max_use'=>'integer|required',
            'type'=>'required|in:fixed,percent',
            'value'=>'required|numeric',
            'start_date'=>'required',
            'end_date'=>'required',
            'status'=>'required'
        ]);

        $data=$request->all();
        //$data['distributor_id']=Auth::guard('distributor')->user()->id;

        $status=$coupon->fill($data)->save();
        if($status)
        {
            request()->session()->flash('success','Coupon Successfully updated');
        }
        else
        {
            request()->session()->flash('error','Please try again!!');
        }
        return redirect()->route('coupon.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $coupon=Coupon::find($id);
        if($coupon)
        {
            $status=$coupon->delete();
            if($status)
            {
                request()->session()->flash('success','Coupon successfully deleted');
            }
            else
            {
                request()->session()->flash('error','Error, Please try again');
            }
            return redirect()->route('coupon.index');
        }
        else
        {
            request()->session()->flash('error','Coupon not found');
            return redirect()->back();
        }
    }

    public function couponStore(Request $request)
    {
        $coupon=Coupon::where('code',$request->code)->first();
        // dd($coupon);
        if(!$coupon){
            request()->session()->flash('error','Invalid coupon code, Please try again');
            return back();
        }
        if($coupon){
            $total_price=Cart::where('user_id',auth()->user()->id)->where('order_id',null)->sum('price');
            // dd($total_price);
            session()->put('coupon',[
                'id'=>$coupon->id,
                'code'=>$coupon->code,
                'value'=>$coupon->discount($total_price)
            ]);
            request()->session()->flash('success','Coupon successfully applied');
            return redirect()->back();
        }
    }
}
