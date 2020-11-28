<?php

use App\Http\Controllers\MailController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/sms', 'SmsController@index')->name('sms');
Route::post('/sms', 'SmsController@storePhoneNumber');
Route::post('/custom', 'SmsController@sendCustomMessage');

Route::get('/mail', 'MailController@index')->name('mail');
Route::post('/mail/send', 'MailController@sendEmail')->name('send-email');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
