<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::group(['middleware'=>'web'],function(){

    Route::get('/', function () {
        return view('welcome');
    });

    Route::resource('/newvendor','AddVendor_C');




    Auth::routes();

    Route::get('/home', 'HomeController@index')->name('home');

    Route::post('/loginn','login@logout');

    Route::get('/AddMedicine','Medicine@index');

    Route::post('/AddMedicine/store','Medicine@store');

    Route::get('/Adminbuy','Medicine@Admin_Buy_show');

    Route::post('/Adminbuy/payment','Medicine@Admin_Buy_pay');
    Route::get('/listMedicine','Medicine@Admin_list');

});


