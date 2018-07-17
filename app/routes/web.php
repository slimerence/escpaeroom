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