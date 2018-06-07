<?php

Route::get('products/{category}','MainController@container');
Route::get('product/{id}','MainController@informPage');
Route::get('about','MainController@about');

Route::get('cart','CartController@index');
Route::get('fastBuy','CartController@fastBuy');
Route::get('buy','CartController@buy');

Route::get('registration','UserController@registration');
Route::get('register','UserController@register');
Route::get('authorisation','UserController@authorisation');
Route::get('authorisate','UserController@authorisate');
Route::get('confirm','UserController@confirm');
Route::get('unlogin','UserController@unlogin');




Route::get('admin','AdminController@index');

Route::get('browse/{table}','AdminController@browse');
Route::get('add/{table}','AdminController@add');
Route::get('edit/{table}/{id}','AdminController@edit');
Route::get('delete/{table}/{id}','AdminController@delete');
Route::get('update/{table}/{id}','AdminController@update');
Route::get('insert/{table}','AdminController@insert');