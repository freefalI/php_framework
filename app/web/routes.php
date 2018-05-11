<?php

Route::get('student/{id}','StudentController@student');
Route::get('students','StudentController@students');
Route::get('admin','AdminController@index');

/*
Route::get('articles/{id}','article@ff');
Route::get('articles','article@index');
Route::get('users/{id}','UserCont@show');
Route::get('root/{id}','UserCont@show');
*/