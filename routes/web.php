<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix'=>'admin','middleware' =>['admin','auth'], 'namespace' =>'admin'], function(){
    Route::get('dashboard', 'Admincontroller@index')->name('admin.dashboard');
});
Route::group(['prefix'=>'user','middleware' =>['user','auth'], 'namespace' =>'user'], function(){
    Route::get('dashboard', 'Usercontroller@index')->name('user.dashboard');
});


