<?php

namespace App\Http\Controllers\Frontend;
use Str;
use Auth;
use App\Models\City;
use App\Models\Category;
use App\Models\State;
use App\Models\Pincode;
use App\Models\Size;
use App\Models\Fabric;
use App\Models\Color;
use App\Models\Orientation;
use App\Models\Texture;
use App\Models\Laminate;
use App\Models\Product;
use App\Models\Catalogue;
use App\Models\Order;
use App\Models\Application;
use Illuminate\Http\Request;
use App\Models\Banner;
Use Alert;
use App\Models\CareerFormLead;
use App\Models\CatalogueUserForm;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\Console\Input\Input;
use App\Models\Contact;
use Spatie\Newsletter\Newsletter;
use App\Models\SubscribeNewsletter;
use Illuminate\Support\Facades\Mail;
use Seshac\Shiprocket\Shiprocket;
use App\Models\Offer;
class HomeController extends Controller
{   
    // public function __construct()
    // {
    //     $categoriesHeader = Category::where('status',1)->where('show_on_header',1)->get();
    // }

    // protected $categoriesHeader;

    // public function __construct() 
    // {
    //     // Fetch the Site Settings object
    //     $this->categoriesHeader = Category::where('status',1)->where('show_on_header',1)->get();
    //     View::share('categoriesHeader', $this->categoriesHeader);
    // }

    public function testShip(){
        // $orderDetails = [
        //     "order_id" => "224-449",
        //     "order_date"  => "2022-02-24 11:11",
        //     "pickup_location"  => "Primary",
        //     "channel_id" => "",
        //     "comment" =>"Reseller: M/s Goku",
        //     "billing_customer_name" => "Naruto",
        //     "billing_last_name" => "Uzumaki",
        //     "billing_address" => "House 221B, Leaf Village",
        //     "billing_address_2" => "Near Hokage House",
        //     "billing_city" => "New Delhi",
        //     "billing_pincode" => "110002",
        //     "billing_state" => "Delhi",
        //     "billing_country" => "India",
        //     "billing_email" => "naruto@uzumaki.com",
        //     "billing_phone" => "9876543210",
        //     "shipping_is_billing" => false,
        //     "shipping_customer_name"=> "Naruto",
        //     "shipping_last_name"=> "Uzumaki",
        //     "shipping_address" => "House 221B, Leaf Village",
        //     "shipping_address_2" => "Near Hokage House",
        //     "shipping_city"=> "New Delhi",
        //     "shipping_pincode" => "110002",
        //     "shipping_country" => "India",
        //     "shipping_state" =>  "Delhi",
        //     "shipping_email"  => "naruto@uzumaki.com",
        //     "shipping_phone" => "9876543210",
        //     "order_items" => [  
        //         [            
        //         "name" => "Kunai",
        //         "sku" => "chakra123",
        //         "units" => 10,
        //         "selling_price" => "900",
        //         "discount"=> "",
        //         "tax" => "",
        //         "hsn" => 441122   
        //         ]        
        //     ],
        //     "payment_method" => "Prepaid",
        //     "shipping_charges" => 0,
        //     "giftwrap_charges" => 0,
        //     "transaction_charges" => 0,
        //     "total_discount" => 0,
        //     "sub_total" => 9000,
        //     "length" => 10,
        //     "breadth" => 15,
        //     "height"=> 20,
        //     "weight"=> 2.5          
        // ];

        // // $orderDetails = json_encode($orderDetails);
        // $token =  Shiprocket::getToken();
        // $response =  Shiprocket::order($token)->create($orderDetails);
       
        //dd($response);
    }

    public function index(Request $request)
    {
        // $useragent=$_SERVER['HTTP_USER_AGENT'];
        // if(preg_match('/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i',$useragent)||preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i',substr($useragent,0,4)))
        // {
        //     $device = 'mobile';
        //     return view('frontend.pages.home_mobile');
        //     Session::forget('email');
        // }
        // else
        // {
            // return view('frontend.pages.home_desktop');
           // $categoriesHeader = Category::where('status',1)->where('show_on_header',1)->get();
            $banners = Banner::where('status',1)->latest()->take(5)->get();
            $newArrivals = Product::where('status','1')->where('is_giftcard',0)->where('is_new',1)->latest()->take(5)->get();
            $bestSellers = Product::where('status','1')->where('is_giftcard',0)->where('is_bestsellers',1)->take(5)->latest()->get();
            $categories = Category::where('status','1')->where('is_parent',1)->where('is_giftcard',0)->orderBy('title','ASC')->get();
            return view('frontend.index',compact('banners','newArrivals','bestSellers','categories'));
        // }
    }

    public function giftcard()
    {   
        $giftcards = Product::where('status','1s')->where('is_giftcard',1)->get();
        return view('frontend.giftcard',compact('giftcards'));
    }

    public function comingSoon(){
        return view('frontend.coming-soon');
    }

    public function dashboard(){
        return view('frontend.dashboard');
    }

  

    public function submitContact(Request $request)
    {   
        $data['name'] = @$request->name;
        $data['email'] = @$request->email;
        $data['mobile'] = @$request->mobile;
        $data['subject'] = @$request->subject;
        $data['message'] = @$request->message;
        Contact::create($data);
        return redirect()->back()->with('success', 'Thank you for your details! Our team will get in touch with you.');
    }

    public function submitNewsletter(Request $request){

        $isAvailable = SubscribeNewsletter::where('email',$request->newsletterEmail)->first();

        if($isAvailable)
        {
            return 2;
        }
        else
        {
            $data['email'] = $request->newsletterEmail;
            SubscribeNewsletter::create($data);
            $email = $request->newsletterEmail;
        
            Mail::send('mail.email-subs',[], function ($message) use ($email) {
                $message->to($email);
                $message->subject('Welcome to Our Community');
            });
            return 1;
        }
    }

    public function viewOrderDetails()
    {
        $orderId = Session::get('orderId');
        $order = Order::where('id',$orderId)->first();
        //session()->forget('orderId');
        return view('user.viewOrderDetails',compact('order'));
    }

    public function testOrder()
    {
        $command = "mysqldump --user=" . env('DB_USERNAME') . " --password=" . env('DB_PASSWORD') . " --host=" . env('DB_HOST') . " " . env('DB_DATABASE') . "  > " . public_path('/images/products/backup.sql');
        $returnVar = NULL;
        $output = NULL;
        exec($command, $output, $returnVar);
    }

    public function notFound()
    {
        return view('frontend.404');
    }

    public function faq(){
        return view('frontend.faq');
    }

    public function contact(){
        return view('frontend.contact');
    }

    public function aboutus()
    {
        return view('frontend.aboutus');
    }

    public function collaboration(){
        return view('frontend.collaboration');
    }

    public function violation(){
        return view('frontend.violation');
    }

    public function exactnessOfProduct(){
        return view('frontend.exactnessOfProduct');
    }

    public function termsAndCondition(){
        return view('frontend.termsAndCondition');
    }

    public function shipping(){
        return view('frontend.shipping');
    }
    public function returns(){
        return view('frontend.returns');
    }
    public function privacy(){
        return view('frontend.privacy');
    }

    public function cancellation(){
        return view('frontend.cancellation');
    }

    public function payment(){
        return view('frontend.payment');
    }

    public function orderStatus(){
        return view('frontend.orderStatus');
    }

    public function whenReceived(){
        return view('frontend.whenReceived');
    }

    public function incorrectOrder(){
        return view('frontend.incorrectOrder');
    }

    public function discountAndVouchers(){
        return view('frontend.discountAndVouchers');
    }

    public function disclaimerOfGuarantee(){
        return view('frontend.disclaimerOfGuarantee');
    }

    public function getProduct(){
        return view('frontend.single');
    }

    public function offers($slug = null)
    {  
        if($slug)
        {   
            $slug = decrypt($slug);
            if($slug == 'offer1')
            {
                $value = Offer::where('offer_type',1)->where('status',1)->first()->offer_value;
                $pageType = 'Buy 3 flat at Rs. '. round($value);
                $pageValue = '1';
                $products = Product::withCount('user_wishlist')
                ->where('status','1')->where('is_giftcard',0)->where('is_offer',1)->whereIn('offer',[1,3])->latest()->paginate(9);
            }
            else if($slug == 'offer2')
            {
                $value = Offer::where('offer_type',2)->where('status',1)->first()->offer_value;
                $pageType = 'Buy 1 and get the 2nd at '. round($value).' OFF';
                $pageValue = '2';
                $products = Product::withCount('user_wishlist')
                ->where('status','1')->where('is_giftcard',0)->where('is_offer',1)->whereIn('offer',[2,3])->latest()->paginate(9);
            }

            $sizes = Size::where('status',1)->get();
            $colors = Color::where('status',1)->get();  
            $fabrics = Fabric::where('status',1)->get();  
            $orientations = Orientation::where('status',1)->get();   
            $maxValue = Product::where('is_giftcard',0)->max('price');                           

            return view('frontend.products', compact('products','pageType','pageValue','sizes','colors','fabrics','orientations','maxValue'));
        }
        else
        {
            return view('frontend.offers');
        }    
    }

    public function getCategoriesProducts(Request $request,$slug= null)
    {        
        $requestData = $request->all();
        $keyword  = $request->get('search');
        $count = Product::where('status','1')->count();
        $pageType = 'Shop By Categories';
        $catId = null;
        $value = isset($request->value) ? $request->value : null;

        $sizes = Size::where('status',1)->get();
        $colors = Color::where('status',1)->get();
        $fabrics = Fabric::where('status',1)->get();
        $orientations = Orientation::where('status',1)->get();  
        $maxValue = Product::where('is_giftcard',0)->max('price');

        if($slug)
        {   
            $category = Category::where('slug',$slug)->first();
            $pageType = 'Shop By Category ' . $category->title;    
            $catId = $category->id;    

            $products = Product::withCount('user_wishlist')
                        ->where(function($t) use($keyword){
                          if(@$keyword)
                          $t->where('name', 'LIKE', "%$keyword%")
                          ->orWhere('slug', 'LIKE', "%$keyword%");
                        })
                        ->where('status','1')
                        ->where('category_id',$category->id)
                        ->where('is_giftcard',0)->latest()->paginate(12);    
        }
        else
        {
            $products = Product::withCount('user_wishlist')
                        ->where(function($t) use( $keyword){
                        if(@$keyword)
                        $t->where('name', 'LIKE', "%$keyword%")
                        ->orWhere('slug', 'LIKE', "%$keyword%");
                        })
                        ->where('status','1')->where('is_giftcard',0)->latest()->paginate(12);
        }

        if ($request->ajax()) 
        {
            return view('frontend.productlisting', ['products'=> $products,'value' => $value]); 
        }
        else
        {
            return view('frontend.products', compact('products','catId','pageType','sizes','colors','fabrics','orientations','maxValue'));
        }       
    }

    public function catalogues()
    {
        $catalogues=Catalogue::where('status','1')->orderBy('sort_order','ASC')->get();

        // $catemail = CatalogueUserForm::where('userid',$userid)->first();
         $catemail = null;

        $states = State::where('status',1)->where('status',1)->orderBy('name')->pluck('name','id');
        return view('frontend.pages.catalogue',compact('catalogues','catemail','states'));

    }

    public function save_catalogue_form(Request $request)
    {
        $utm_source = '';
        $utm_campaign = '';
        $utm_medium = '';
        $utm_display = '';
        $requestData = $request->all();

        $contact = $requestData['contact'];
        $requestData['userid'] = Session::get('userid');
        $time = date('Y-m-d');
        $cat = CatalogueUserForm::where('contact',$contact)->where('catalogue_id',$requestData['catalogue_id'])->whereDate('created_at',$time)->count();
        if($cat == 0){
        $catalogform=CatalogueUserForm::create($requestData);


            // $city = City::where('id',$requestData['city_id'])->first();
            // $cityval = $city->name;
			// $state = State::where('id',$requestData['state_id'])->first();
			// $stateval = $state->state_name;
            // $name = $requestData['name'];
            // $mobile = $requestData['contact'];
            // if(!empty($requestData['utm_source'])){
            //  $utm_source = $requestData['utm_source'];
            // }
            // if(!empty($requestData['utm_medium'])){
            //  $utm_medium = $requestData['utm_medium'];
            // }
            // if(!empty($requestData['utm_campaign'])){
            //  $utm_campaign = $requestData['utm_campaign'];
            // }
            // if(!empty($requestData['utm_display'])){
            //  $utm_display = $requestData['utm_display'];
            // }
            // $campaignid = 255;
            // $arrayData = array('first_name'=>$name,'mobile'=>$mobile,'campaign_medium'=>$campaignid,'company_name'=>$cityval,'enquiry_type'=>2,'branch_id'=>1,'city'=>$city->id,'state'=>$city->state_id,'utm_source'=>$utm_source,'utm_campaign'=>$utm_campaign,'utm_medium'=>$utm_medium,'utm_display'=>$utm_display);

            // $url = "https://royaletouche.infi.cf/externalInquirySaveNew";

            //   $ch = curl_init();
            //   curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            //   curl_setopt($ch, CURLOPT_URL, $url);
            //   curl_setopt($ch, CURLOPT_POST, 1);
            //   curl_setopt($ch, CURLOPT_POSTFIELDS, $arrayData);
            //   $data1 = curl_exec($ch);

            //   curl_close($ch);

			//     //microsoft crm code

			// 	$micro_arrayData = array('first_name'=>$name,'mobile'=>$mobile,'city'=>$cityval,'email'=>$requestData['email'],'state'=>$stateval,'utm_source'=>'website','utm_campaign'=>'product_catelogue','utm_medium'=>'','utm_display'=>'','utm_term'=>'','utm_content'=>'','gclid'=>'','fbclid'=>'','form_type'=>'product_catelogue','What you want to revamp?'=>'','page_type'=>'');

			// 	//$micro_url = "https://prod-05.centralindia.logic.azure.com:443/workflows/e7defc5b79d94188bbe42f73dd08bda1/triggers/manual/paths/invoke?api-version=2016-06-01&sp=%2Ftriggers%2Fmanual%2Frun&sv=1.0&sig=XY0tvrFd6KSIMFHzG2N3FuInzgfm1fvGvvTXK1YdMLo";
            //     $micro_url = "https://prod-26.centralindia.logic.azure.com:443/workflows/f554dc4513ee4d1fbe83f508df9f6999/triggers/manual/paths/invoke?api-version=2016-06-01&sp=%2Ftriggers%2Fmanual%2Frun&sv=1.0&sig=dZYjHJuMbNbEswanctpU7qfdLoj2--nYDAjhzoJovKs";
			// 	$ch = curl_init();
			//     curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			// 	curl_setopt($ch, CURLOPT_URL, $micro_url);
			// 	curl_setopt($ch, CURLOPT_POST, 1);
			// 	curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($micro_arrayData));
			// 	curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
			// 	$micro_data1 = curl_exec($ch);
			// 	//dd($micro_data1);

			// 	curl_close($ch);
				//end of microsoft crm code

        if(isset($catalogform)){

          $catalog=Catalogue::where('id',$requestData['catalogue_id'])->first();
            $requestData['catalogue_id']=$catalog->title;
            $requestData['catalog_file']=$catalog->download_file;
            View::share('requestData', $requestData);
            return json_encode(array('statusCode'=>200,'msg'=>'Thank you!!! We have sent our catalogue via WHATSAPP to your number. Our executive in your city will connect with you soon...'));

         try {
                //    $catalog = preg_replace("|https:\/\/ik.imagekit.io/heccv5isbw\/\s*/*|","",$requestData['catalog_file']);


                //    Mail::send('emails.catlogformuser', $requestData, function ($message) use ($requestData)
                //    {
                //        $message->from('sales@royaletouche.com', 'Royale Touche');
                //        $message->to($requestData['email'])->subject('Greetings from Royale Touche!');
                //        $message->attach($requestData['catalog_file'], [
                //               'as' => $requestData['catalog_id'],
                //               'mime' => 'application/pdf'
                //          ]);
                //    });


                       return json_encode(array('statusCode'=>200,'msg'=>'Thank you!!! We have sent our catalogue via WHATSAPP to your number. Our executive in your city will connect with you soon...'));
            }
            catch (Exception $e)
            {
             return json_encode(array('statusCode'=>200,'msg'=>'Thank you!!! We have sent our catalogue via WHATSAPP to your number. Our executive in your city will connect with you soon...'));
            }

        }else{
        return json_encode(array('statusCode'=>200,'msg'=>'Thank you!!! We have sent our catalogue via WHATSAPP to your number. Our executive in your city will connect with you soon...'));
        }
        }
        else{
        return json_encode(array('statusCode'=>200,'msg'=>'We have already recieved your details. Our team will get in touch with you.'));
        }
    }

    public function selectcity(Request $request){
       // $id = Input::get('state_id');

        $cities=City::where('state_id', $request->state_id)->where('status','1')->orderBy('name')->get();
        $html='';
        $html='<select name="city_id" id="city_id" class="form-control chosen-select-deselect1">
          <option value=""> Select City </option>';
            foreach ($cities as $key => $value) {
               $html.='<option value="'.$value->id.'"';

                $html .= '>'.$value->name.'</option>';
            }


        $html.='</select>';

      echo $html;

    }

    public function selectcity1(Request $request){
        $id = Input::get('state_id');
        $cities=City::where('status',1)->where('state_id',$id)->orderBy('name')->get();
        $html='';
        $html='<select name="city_id" id="city_id" class="form-control chosen-select-deselect1">
          <option value=""> Select City </option>';
            foreach ($cities as $key => $value) {
               $html.='<option value="'.$value->id.'"';

                $html .= '>'.$value->name.'</option>';
            }

        $html.='</select>';

      echo $html;

    }

    public function careers()
    {
        if(Auth::check()){
            $cities = City::where('status',1)->orderBy('name')->pluck('name');
            return view('frontend.pages.careers',compact('cities'));
        }else{
            return redirect('user/login');
        }

    }


    public function save_careers_page_form(Request $request){

        $this->validate($request,
        [
            'name'=>'string|required|max:30',
            'contact'=>'string|required|max:10|min:10',
            'email'=>'email',
            'city'=>'string|required|max:30',

        ]);

        $rand= rand();
        $requestData = $request->all();

        if ($request->hasFile('resume')) {
            $filename=Str::slug($requestData['name']).$request->file('resume')->getClientOriginalName();
            $request->resume->move(public_path('/frontend/uploads'), $filename);
            $requestData['resume'] ='/frontend/uploads/'.$filename;

        }
        $career=CareerFormLead::create($requestData);
        if(isset($career)){
            return redirect()->back()->with('success', 'Thank you for your details! Our team will get in touch with you.');

        }else{
        return response('Something went wrong.', 500);
        }

    }

    public function companyprofile()
    {
        return view('comapanyprofile');
    }

    public function royale_touche_brands()
    {
        return view('royale_touche_brands');
    }

    public function achievements()
    {
        return view('achivements');
    }

    public function corporatevideo()
    {
        return view('corporatevideo');
    }

    public function guide(Request $request){

        if($request->applications){
            Session::put('applications',$request->applications);

            $laminates = Laminate::where('status',1)->orderBy('sort_order','asc')->get();
            return view('frontend.pages.guide_laminates',compact('laminates'));
        }

        if($request->laminates){

            Session::put('laminates',$request->laminates);
            
            $textures = Texture::where('status',1)->get();
            return view('frontend.pages.guide_textures',compact('textures'));
        }

        if($request->textures){

            $textures =$request->textures;
            // Session::put('textures',$textures);
            $laminates = Session::get('laminates');
            $applications = Session::get('applications');

            return redirect('products?laminates='.$laminates.'&applications='.$applications.'&textures='.$textures.'');
            

        }


        $applications = Application::where('status',1)->get();
        return view('frontend.pages.guide_applications',compact('applications'));
    }  

    public function contactus()
    {
        return view('contactus');
    }

    public function quality()
    {
        return view('frontend.pages.quality');
    }

    public function blog()
    {
        return view('blog');
    }


    public function downloadimg($img){
        $img ="https://royaletouchene.s3.ap-south-1.amazonaws.com/".$img;
         header("Cache-Control: public");
         header("Content-Description: File Transfer");
         header("Content-Disposition: attachment; filename=" . basename($img));
         header("Content-Type: image/jpeg");
          echo readfile($img);

    }


    public function calculate_fright_charge(Request $request){

        $validator = Validator::make($request->all(),[
            'pincode' => 'required|integer|regex:/\b\d{6}\b/|exists:pincodes,pincode',
        ],[
            'pincode.regex'=>'Please enter a valid 6 digit pincode',
            'pincode.required' => 'The pincode field is required',
            'pincode.exists' => 'Pincode is not exists',
        ]);

       if($validator->fails()){
          return response()->json($validator->messages(), 200);
       }

       $pincode =  Pincode::where('pincode',$request->pincode)->select('freight_charge','pincode','minimum_bundle_qty')->first()->toArray();
        
       $cart_product_qty =  get_cart_product_qty();
       
       for($i=1; $i<=$cart_product_qty; $i++){

        $check = $pincode['minimum_bundle_qty']*$i;
        if($cart_product_qty <=$check){
            $pincode['freight_charge']=$pincode['freight_charge']*$i;
            break;
        }
       }

       Session::put('freight_charge', $pincode );
      return response()->json($pincode , 200);
    }

    public function save_order_note(Request $request){

       Session::put('order_note', $request->order_note );

      return response()->json( 200);

        
    }

  


}
