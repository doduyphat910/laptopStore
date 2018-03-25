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


//admin

Route::get('admin/getLogin','UserController@loginAdmin');
Route::post('admin/getLogin','UserController@postloginAdmin');
Route::get('admin/logout', 'UserController@logout');

Route::group(['prefix'=>'admin', 'middleware'=>'adminLogin'], function(){
	//return view('Admin1.content.index');

	Route::group(['prefix'=>'user'],function(){

	Route::get('lists', 'UserController@lists');
	Route::get('add','UserController@add');
	Route::post('postAdd','UserController@postAdd');
	Route::get('update/{id}','UserController@update');
	Route::post('postUpdate/{id}','UserController@postUpdate');
	Route::get('delete/{id}','UserController@delete');

	});


	Route::group(['prefix'=>'catalog'],function(){	

	Route::get('lists', 'AdminCatalogController@lists');
	Route::get('add','AdminCatalogController@add');
	Route::post('postAdd','AdminCatalogController@postAdd');
	Route::get('update/{id}','AdminCatalogController@update');
	Route::post('postUpdate/{id}','AdminCatalogController@postUpdate');
	Route::get('delete/{id}','AdminCatalogController@delete');

	});

	Route::group(['prefix'=>'laptop'],function(){

	Route::get('listLP', 'AdminLaptopController@listLP');
	Route::get('add','AdminLaptopController@add');
	Route::post('postAdd','AdminLaptopController@postAdd');
	Route::get('update/{id}','AdminLaptopController@update');
	Route::post('postUpdate/{id}','AdminLaptopController@postUpdate');
	Route::get('delete/{id}','AdminLaptopController@delete');

	});

	Route::group(['prefix'=>'slide'],function(){

	Route::get('lists', 'AdminSlideController@lists');
	Route::get('add','AdminSlideController@add');
	Route::post('postAdd','AdminSlideController@postAdd');
	Route::get('update/{id}','AdminSlideController@update');
	Route::post('postUpdate/{id}','AdminSlideController@postUpdate');
	Route::get('delete/{id}','AdminSlideController@delete');

	});
		
});

