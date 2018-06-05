<?php

Route::get('products/{category}','Main@container');
Route::get('product/{id}','Main@informPage');

Route::get('cart','Main@cart');
Route::get('about','Main@about');
Route::get('registration','Main@registration');
Route::get('authorisation','Main@authorisation');
Route::get('authorisate','Main@authorisate');
Route::get('register','Main@register');
Route::get('confirm','Main@confirm');
Route::get('unlogin','Main@unlogin');
Route::get('fastBuy','Main@fastBuy');
Route::get('buy','Main@buy');


Route::get('admin','AdminController@index');

Route::get('browse/{table}','AdminController@browse');
Route::get('add/{table}','AdminController@add');
Route::get('edit/{table}/{id}','AdminController@edit');

Route::get('delete/{table}/{id}','AdminController@delete');
Route::get('update/{table}/{id}','AdminController@update');
Route::get('insert/{table}','AdminController@insert');