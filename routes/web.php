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

Route::get('/', [ShopController::class, 'index'])
    ->name('shop.index')->middleware('auth'); //認証機能のためのもの
Route::post('serch_result', 'ShopController@yelp_api')->name('shop.search');

Route::get('currentLocation', 'ShopController@currentLocation')->name('result.curretnLocation');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/mypage/', 'UserController@profile');

Route::get('/mypage/edit', 'UserController@edit');

Route::put('/mypage/', 'UserController@update');

Route::post('/yelp', 'ShopController@yelp_api');
