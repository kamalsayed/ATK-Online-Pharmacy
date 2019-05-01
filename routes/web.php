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

    Route::get('/aboutus',function (){
       return view('aboutus');
    });
    Route::resource('/newvendor','AddVendor_C');

    Route::get('/Edituser','edit_user@index');

    Route::post('/Update_user','edit_user@edit');

    Route::post('/update_delete','edit_user@update');

    Route::get('/vendor_list','Medicine@vendor_list');

    Route::get('/vendor_charge','showCharge_c@vendor_show');

    Route::post('/vendor_collect','showCharge_c@vendor_collect');

    Route::post('/ReportDownload','HomeController@generatePDF');

    Route::get('/Reportshow','HomeController@showReport');

    Auth::routes();

    Route::get('/home', 'HomeController@index')->name('home');

    Route::post('/loginn','login@logout');

    Route::get('/AddMedicine','Medicine@index');

    Route::post('/AddMedicine/store','Medicine@store');

    Route::get('/Adminbuy','Medicine@Admin_Buy_show');

    Route::post('/Adminbuy/payment','Medicine@Admin_Buy_pay');
    Route::get('/listMedicine','Medicine@Admin_list');
    Route::get('/showCharge','showCharge_c@showCharge');
    Route::post('/addCharge','showCharge_c@charge');
    Route::get('/Medicines','Medicine@Show_medicine_card');
    Route::post('/Buy_client','Medicine@Client_buy');
    Route::get('/contactus','feedback@fb_view');
    Route::post('/send_Feedback','feedback@give_Feedback');
    Route::get('/listfeed','feedback@list_Feedback');
});


