<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/7/16
 * Time: 13:36
 */
Route::get('/about-us', '\Smartbro\Controllers\frontend\CustomPageController@about');
Route::get('/games', '\Smartbro\Controllers\frontend\CustomPageController@games');
Route::get('/team-building', '\Smartbro\Controllers\frontend\CustomPageController@team');
Route::get('/party', '\Smartbro\Controllers\frontend\CustomPageController@party');
Route::get('/faq', '\Smartbro\Controllers\frontend\CustomPageController@faq');
Route::get('/franchise', '\Smartbro\Controllers\frontend\CustomPageController@join');


Route::prefix('catalog')->group(function() {
    Route::get('product/{uri}/{sort}', '\Smartbro\Controllers\frontend\CustomPageController@change_month');
});

Route::prefix('api/booking')->group(function(){
    // 查询有效的 time slot
    Route::any('get-available-time-slot','\Smartbro\Controllers\frontend\ApiController@get_available_time_slot');
    // 生成 Booking
    Route::post('confirm','\Smartbro\Controllers\frontend\ApiController@booking_confirm');
    // 取消
    Route::post('cancel','\Smartbro\Controllers\frontend\ApiController@booking_cancel');
    // 验证 coupon 的 route
    Route::post('coupon-verify','\Smartbro\Controllers\frontend\ApiController@coupon_verify');
});

Route::prefix('admin')->middleware('auth')->group(function(){

    Route::get('/home','\Smartbro\Controllers\backend\AdminController@index');
    Route::get('/reservations/all','\Smartbro\Controllers\backend\AdminController@tables');
    Route::get('/reservations/coming','\Smartbro\Controllers\backend\AdminController@tablescoming');
    Route::get('/reservations/finished','\Smartbro\Controllers\backend\AdminController@tablespast');
    Route::get('/reservations/delete/{id}', '\Smartbro\Controllers\backend\AdminController@delete');
    Route::get('/reservations/edit/{id}', '\Smartbro\Controllers\backend\AdminController@edit');
    Route::post('/reservations/update/{id}', '\Smartbro\Controllers\backend\AdminController@update');
    Route::get('/customers', '\Smartbro\Controllers\backend\AdminController@customer');


});