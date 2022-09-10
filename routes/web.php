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
/*Route::get('/',funcion(){
    return view('index');
});*/
use App\Http\Controllers\ShopController;

Route::get('/',[ShopController::class,'index'])
    ->name('shop.index')->middleware('auth');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/mypage/','UserController@profile');

Route::get('/mypage/edit','UserController@edit');

Route::put('/mypage/','UserController@update');

