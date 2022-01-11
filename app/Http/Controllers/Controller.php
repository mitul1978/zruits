<?php

namespace App\Http\Controllers;

use App\Models\Category;

use Illuminate\Support\Facades\View;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected $categoriesHeader;

    public function __construct()
    {
        //         $userid = uniqid();
        //     if(!Session::has('userid')){
        //        Session::put('userid',$userid);
        //     }
        //        if(Request::segment(1))
        //          {
        //           $breadcrumb=Breadcrumb::where('page',Request::segment(1))->first();
        //            $metadata=Metadata::where('page',Request::segment(1))->first();
        //          }else{
        //           $breadcrumb='';
        //            $metadata=Metadata::where('page','index')->first();
        //          }

        //            View::share('breadcrumb',$breadcrumb);
        //            View::share('metadata',$metadata);

      $rupee = '&#x20B9;';
      View::share('rupee',$rupee );

      $this->categoriesHeader = Category::where('status',1)->where('show_on_header',1)->get();
      View::share('categoriesHeader', $this->categoriesHeader);

  }

}
