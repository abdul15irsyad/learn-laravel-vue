<?php

use Illuminate\Http\Request;

Route::group([], function () {
  Route::get('users', 'UserController@all');
  Route::get('users/{id}', 'UserController@show');
  Route::post('users', 'UserController@create');
  Route::put('users/{id}', 'UserController@update');
  Route::delete('users/{id}', 'UserController@delete');
});

Route::group([], function () {
  Route::get('drinks', 'DrinkController@all');
  Route::get('drinks/{id}', 'DrinkController@show');
  Route::post('drinks', 'DrinkController@create');
  Route::put('drinks/{id}', 'DrinkController@update');
  Route::delete('drinks/{id}', 'DrinkController@delete');
});
