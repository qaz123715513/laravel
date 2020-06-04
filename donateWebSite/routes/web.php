<?php

use Illuminate\Support\Facades\Route;

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

//Route::get("/", "PaymentsController@loginForm")->name("loginForm");
//Route::post("/", "PaymentsController@loginProcess")->name("loginProcess");

Route::get('/', function () {
    return view('/donatePage');
});

Route::get('/', function () {
    return view('/donatePage');
});

Route::get('CheckCode', 'CheckCodeController@image');
/*Route::post('/', function () {
    return view('/donatePage');
});*/


//Route::post('/pay.php', 'PaymentsController@getAccount');

