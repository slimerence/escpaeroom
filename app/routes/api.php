<?php
/**
 * Created by PhpStorm.
 * User: justinwang
 * Date: 10/7/18
 * Time: 5:34 PM
 */
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