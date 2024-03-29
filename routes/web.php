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

use App\Mail\VerificationMail;
use Illuminate\Support\Facades\Mail;

Auth::routes();

Route::get('/', 'IndexController@index')->name('index');
Route::get('/about', 'AboutController@index')->name('about');
Route::get('/haji', 'HajiController@index')->name('haji');
Route::get('/umrah', 'UmrahController@index')->name('umrah');
Route::get('/home', 'HomeController@index')->name('home.index');
Route::resource('outbox', 'OutboxController');
Route::resource('inbox', 'InboxController');
Route::resource('post', 'PostController');
Route::resource('mail', 'MailController');
Route::get('show/{id}','ShowController@show');
Route::get('outbox/create/{id}',['as' => 'outbox.create', 'uses' => 'OutboxController@create']);