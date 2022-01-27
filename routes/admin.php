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

    //distributor
    Route::resource('distributor','DistributorController');

    //color master
    Route::resource('colors','ColorController');

    //size master
    Route::resource('sizes','SizeController');

    //States
    Route::resource('states','StateController');
    Route::post('get_cities_by_state_id','StateController@get_cities_by_state_id');
    Route::resource('cities','CityController');
    Route::resource('pincodes','PincodeController');


    // Banner
    Route::resource('banner','BannerController');
    // Brand
    Route::resource('brand','BrandController');
    // Profile
    Route::get('/profile','AdminController@profile')->name('admin-profile');
    Route::post('/profile/{id}','AdminController@profileUpdate')->name('profile-update');
    // Category
    Route::resource('/category','CategoryController');

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
    Route::post('/product/update/characteristics/{id}','ProductController@update_characteristics');
    Route::get('/color_palette_preview/{id}', 'ProductController@color_palette_preview');
    Route::resource('/product','ProductController');



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

});
