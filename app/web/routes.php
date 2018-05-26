<?php

Route::get('student/{id}','StudentController@student');
Route::get('students','StudentController@students');
// Route::get('admin','AdminController@index');
Route::get('products','Main@container');
// Route::get('cart','CartController@index');
Route::get('cart','Main@cart');

/*
Route::get('articles/{id}','article@ff');
Route::get('articles','article@index');
Route::get('users/{id}','UserCont@show');
Route::get('root/{id}','UserCont@show');
*/
Route::get('browse','AdminController@browse');
Route::get('edit/{id}','AdminController@edit');
Route::get('add','AdminController@add');
Route::get('delete/{id}','AdminController@delete');
Route::get('update/{id}','AdminController@update');
Route::get('insert','AdminController@insert');

