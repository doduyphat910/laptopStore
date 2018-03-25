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

// Route::get('/', function () {
//     //return view('welcome');
//     //return redirect('web/content/product');
// });
Route::get('/', 'LaptopController@listproduct');
Route::get('listCatalog/{id}','LaptopController@listCatalog');
Route::get('catalog','CatalogController@danhsach' );

Route::get('product', 'LaptopController@listproduct');
Route::post('search', 'LaptopController@search');
Route::get('detail/{id}', 'LaptopController@detail');

//Cart
Route::get('buyProduct/{id}','CartController@buyProduct');
Route::get('cartContent', 'CartController@cartContent');
Route::get('deleteCart/{id}', 'CartController@cartDelete');
Route::get('updateQtyMinus/{id}', 'CartController@updateQtyMinus');
Route::get('updateQtyPlus/{id}', 'CartController@updateQtyPlus');
Route::get('ajaxTotal', 'CartController@ajaxTotal');
Route::get('ajaxCount', 'CartController@ajaxCount');