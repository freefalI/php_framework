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
// Route::get('browse','AdminController@browse');
// Route::get('add','AdminController@add');

// Route::get('edit/{id}','AdminController@edit');
// Route::get('delete/{id}','AdminController@delete');
// Route::get('update/{id}','AdminController@update');
// Route::get('insert','AdminController@insert');

Route::get('admin','AdminController@index');

// Route::get('browse/goods','AdminController@browseGoods');
// Route::get('browse/categories','AdminController@browseCategories');
// Route::get('browse/brands','AdminController@browseBrands');
Route::get('browse/{table}','AdminController@browse');

// Route::get('add/product','AdminController@addProduct');
// Route::get('add/category','AdminController@addCategory');
// Route::get('add/brand','AdminController@addBrand');
Route::get('add/{table}','AdminController@add');


// Route::get('edit/product/{id}','AdminController@editProduct');
// Route::get('edit/category/{id}','AdminController@editCategory');
// Route::get('edit/brand/{id}','AdminController@editBrand');
Route::get('edit/{table}/{id}','AdminController@edit');

// Route::get('delete/product/{id}','AdminController@deleteProduct');
// Route::get('delete/category/{id}','AdminController@deleteCategory');
// Route::get('delete/brand/{id}','AdminController@deleteBrand');
Route::get('delete/{table}/{id}','AdminController@delete');

// Route::get('update/product/{id}','AdminController@updateProduct');
// Route::get('update/category/{id}','AdminController@updateCategory');
// Route::get('update/brand/{id}','AdminController@updateBrand');
Route::get('update/{table}/{id}','AdminController@update');

// Route::get('insert/product','AdminController@insertProduct');
// Route::get('insert/category','AdminController@insertCategory');
// Route::get('insert/brand','AdminController@insertBrand');
Route::get('insert/{table}','AdminController@insert');