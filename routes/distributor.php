<?php

use Illuminate\Support\Facades\Route;



Route::group(['prefix' => 'distributor', 'namespace' => 'Distributor\Auth','middleware' =>'distributor_guest'], function () {
    // Route::get('login', 'LoginController@showLoginForm')->name('login');

    Route::get('/', function () {
        return redirect('distributor/login');
    });

     Route::get('/login', function () {
             return view('distributor.auth.login');
         });


     Route::post('login', 'LoginController@login')->name('distributor.login');
     Route::any('logout', 'Auth\LoginController@logout')->name('distributor.logout');

     Route::get('password/reset', 'ForgotPasswordController@showLinkRequestForm')->name('distributor.password.request');
     Route::post('password/email', 'ForgotPasswordController@sendResetLinkEmail')->name('distributor.password.email');
     Route::get('password/reset/{token}', 'ResetPasswordController@showResetForm')->name('distributor.password.reset');
     Route::post('password/reset', 'ResetPasswordController@reset')->name('distributor.password.update');
 });


Route::group(['prefix' => 'distributor','namespace' => 'Distributor', 'middleware' =>'distributor'], function () {

    Route::any('logout', 'Auth\LoginController@logout')->name('distributor.logout');
    Route::get('/home', 'DistributorController@index')->name('distributor.home');
    Route::get('/profile', 'DistributorController@profile')->name('distributor.profile');
    Route::post('/profile/{id}','DistributorController@profileUpdate')->name('distributor.profile-update');
    Route::get('change-password', 'DistributorController@changePassword')->name('distributor.change.password.form');
    Route::post('change-password', 'DistributorController@changPasswordStore')->name('distributor.change.password');


    Route::get('/order',"OrderController@orderIndex")->name('distributor.order.index');

    //Dealer
    Route::resource('/dealer','DealerController');
    Route::resource('/coupon','CouponController');

});
