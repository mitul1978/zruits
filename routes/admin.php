<?php
use Illuminate\Support\Facades\Route;

// Backend section start


Route::post('user/login','LoginController@loginSubmit')->name('login.submit');
Route::get('user/logout','LoginController@logout')->name('user.logout');

Route::group(['prefix'=>'/admin','middleware'=>['auth','admin']],function(){

    Route::get('/','AdminController@index')->name('admin');

    Route::get('/file-manager',function(){
        return view('backend.layouts.file-manager');
    })->name('file-manager');
    
    // user route
    Route::resource('users','UsersController');

    //export User
    Route::get('exportUsers', 'UsersController@export');

    //distributor
    Route::resource('distributor','DistributorController');

    //color master
    Route::resource('colors','ColorController');

    //size master
    Route::resource('sizes','SizeController');
    //size chart master
    Route::resource('sizecharts','SizeChartController');

    //fabric master
    Route::resource('fabrics','FabricController');

    //Orientations
    Route::resource('orientations','OrientationController');

    //States
    Route::resource('states','StateController');
    Route::post('get_cities_by_state_id','StateController@get_cities_by_state_id');
    Route::resource('cities','CityController');
    Route::resource('pincodes','PincodeController');

    // Offer
    //Route::resource('offer','OfferController');
    // Banner
    Route::resource('banner','BannerController');
    // Brand
    Route::resource('brand','BrandController');

    Route::resource('/orderstatus','OrderStatusController');

    // Profile
    Route::get('/profile','AdminController@profile')->name('admin-profile');
    Route::post('/profile/{id}','AdminController@profileUpdate')->name('profile-update');
    // Category
    Route::resource('/category','CategoryController');
    Route::resource('/offer','OfferController');

    // Application
    Route::resource('/application','ApplicationController');

    // Laminates
    Route::resource('/laminate','LaminatesController');

    // Textures
    Route::resource('/texture','TextureController');

    // Thicknesses
    Route::resource('/thickness','ThicknessController');

    // Feature
    Route::resource('/feature','FeatureController');

    // Characteristics
    Route::resource('/characteristic','CharacteristicController');

    // Color palettes
    Route::resource('/color-palette','ColorPaletteController');

    // attribute
    Route::resource('/attribute','AttributeController');

    // Product
    Route::get('/product/edit/characteristics/{id}','ProductController@edit_characteristics');
    Route::get('/product/viewStock/{id}','ProductController@viewStock');
    Route::post('/product/update/characteristics/{id}','ProductController@update_characteristics');
    Route::get('/color_palette_preview/{id}', 'ProductController@color_palette_preview');
    Route::resource('/product','ProductController');
    Route::post('/product/deleteImage','ProductController@deleteImage');
    Route::post('/product/deleteVariation','ProductController@deleteVariation');

    Route::get('/importProducts','ProductController@importProducts');
    Route::get('/importProductImages','ProductController@importProductImages');
    Route::get('/importProductStocks','ProductController@importProductStocks');

    Route::post('/importProducts','ProductController@storeImportProducts');
    Route::post('/importProductImages','ProductController@storeImportProductImages');
    Route::post('/importProductStocks','ProductController@storeImportProductStocks');
    Route::get('exportMasterProducts', 'ProductController@exportProducts');
    Route::get('exportProductStocks', 'ProductController@exportStocks');
    Route::get('exportProductImages', 'ProductController@exportImages');


    // Ajax for sub category
    Route::post('/category/{id}/child','CategoryController@getChildByParent');
    // POST category
    Route::resource('/post-category','PostCategoryController');
    // Post tag
    Route::resource('/post-tag','PostTagController');
    // Post
    Route::resource('/post','PostController');
    // Message
    Route::resource('/message','MessageController');
    Route::get('/message/five','MessageController@messageFive')->name('messages.five');

    // Order
    Route::resource('/order','OrderController');
    // Shipping
    Route::resource('/shipping','ShippingController');
    // Coupon
    Route::resource('/coupon','CouponController');
    // Settings
    Route::get('settings','AdminController@settings')->name('settings');
    Route::post('setting/update','AdminController@settingsUpdate')->name('settings.update');

    // Notification
    Route::get('/notification/{id}','NotificationController@show')->name('admin.notification');
    Route::get('/notifications','NotificationController@index')->name('all.notification');
    Route::delete('/notification/{id}','NotificationController@delete')->name('notification.delete');
    // Password Change
    Route::get('change-password', 'AdminController@changePassword')->name('change.password.form');
    Route::post('change-password', 'AdminController@changPasswordStore')->name('change.password');



    Route::get('/invoice/{order_id}','InvoiceController@invoice')->name('invoice')->middleware('admin');

    Route::resource('/contact','ContactController');    
    //export Contacts
    Route::get('exportContacts', 'ContactController@export');

    Route::resource('/subscription','SubscriptionController');    
    //export Newsletter Subscribers
    Route::get('exportSubscribers', 'HomeController@export');
});
