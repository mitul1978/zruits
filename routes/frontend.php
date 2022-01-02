<?php

use Illuminate\Support\Facades\Route;

Route::group(['namespace' => 'Frontend'], function () {

    Route::get('/','HomeController@index')->name('home');
    Route::get('/404','HomeController@notFound  ');

    Route::get('user/login','LoginController@login');
    Route::post('user/login','LoginController@loginSubmit')->name('login.submit');
    Route::any('user/logout','LoginController@logout')->name('user.logout');
    Route::get('user/register','LoginController@register')->name('register.form');
    Route::post('user/register','LoginController@registerSubmit')->name('register.submit');
    Route::post('user/update','LoginController@update')->name('register.submit');
    
    // Reset password
    Route::post('password-reset', 'FrontendController@showResetForm')->name('password.reset');   

    // Route::get('about-us','HomeController@aboutus')->name('aboutus');
    // Route::get('guide/{type}','HomeController@guide')->name('guide');
    // Route::get('quality','HomeController@quality');
    // Route::get('catalogues','HomeController@catalogues')->name('catalogues');
    // Route::post('save-catalogue-form','HomeController@save_catalogue_form');
    // Route::get('select-city','HomeController@selectcity');

    // Route::get('careers','HomeController@careers')->name('careers');
    // Route::post('/save_careers_page_form', 'HomeController@save_careers_page_form')->name('save_careers_page_form');

    // Products routes
    Route::get('products', 'ProductController@products')->name('products');
    Route::get('product/{slug}', 'ProductController@product')->name('product');


    // Wishlist
    Route::get('/wishlist',function(){
        return view('user.pages.wishlist');
    })->name('wishlist')->middleware('user');

    // Route::get('/wishlist',function(){
    //     return view('frontend.wishlist');
    // });

    Route::get('/single',function(){
        return view('frontend.single');
    });

    Route::get('/category',function(){
        return view('frontend.category');
    });

    Route::get('/coming-soon',function(){
        return view('frontend.coming-soon');
    });

    Route::get('/dashboard',function(){
        return view('frontend.dashboard');
    });


    Route::get('/contact',function(){
        return view('frontend.contact');
    });

    Route::get('/product',function(){
        return view('frontend.product');
    });

    // Route::get('/login',function(){
    //     return view('frontend.login');
    // });

    // Route::get('/wishlist/{slug}','WishlistController@wishlist')->name('add-to-wishlist')->middleware('user');
    Route::post('/wishlist','WishlistController@wishlist')->name('add-to-wishlist')->middleware('user');
    Route::get('wishlist-delete/{id}','WishlistController@wishlistDelete')->name('wishlist-delete');

    //Apply-coupon
    Route::post('/coupon-store','CouponController@couponStore')->name('coupon-store');

    //Apply-coupon
    Route::post('/coupon-remove','CouponController@couponStore')->name('coupon-remove');    

    // Cart section

    Route::get('/cart',function()
    {
        return view('frontend.cart');
    })->name('cart');

    // Route::get('/cart',function(){
    //     return view('frontend.pages.cart2');
    // })->name('cart');


    Route::get('/add-to-cart/{slug}','CartController@addToCart')->name('add-to-cart')->middleware('user');
    Route::post('/add-to-cart','CartController@singleAddToCart')->name('single-add-to-cart')->middleware('user');
    Route::post('cart-delete/{id}','CartController@cartDelete')->name('cart-delete');
    Route::post('cart-update','CartController@cartUpdate')->name('cart.update');

    Route::get('/user/cart',function(){
        return view('user.pages.cart');
    })->name('user-cart')->middleware('user');

    Route::post('remove-user-address/{id}','UserAddressController@removeUserAddress')->name('remove-user-address')->middleware('user');
    Route::post('edit-user-address/{id}','UserAddressController@editUserAddress')->name('edit-user-address')->middleware('user');
    Route::post('update-user-address/{id}','UserAddressController@updateUserAddress')->name('update-user-address')->middleware('user');


    // Route::post('/ajax-add-to-cart','CartController@ajax_addToCart')->name('ajax-add-to-cart');
    Route::post('/ajax-add-to-cart','CartController@ajax_addToCart')->name('ajax-add-to-cart');

    //ETC

    Route::get('downloadimg/{name}', 'HomeController@downloadimg');
    Route::post('calculate-fright-charge', 'HomeController@calculate_fright_charge')->name('calculate-fright-charge');
    Route::post('save-order-note', 'HomeController@save_order_note')->name('save-order-note');




    //Checkout page

    Route::get('/checkout','CheckoutController@checkout')->name('checkout');  

    //Place Order

    Route::post('/place-order','OrdersController@place_order')->name('place-order');

    Route::get('/payment-initiate/{order_number}','RazorpayPaymentController@payment_initiate');
    Route::post('/payment-response','RazorpayPaymentController@payment_response')->name('payment-response');


    Route::get('/invoice/{order_id}','InvoiceController@invoice')->name('invoice')->middleware('user');

});