<?php


// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', 'HomeController@welcome');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::post('/login', 'Auth\LoginController@login')->name('post.login');
Route::post('/register', 'Auth\LoginController@register')->name('post.register');
Route::get('/logout', 'Auth\LoginController@logout')->name('logout');


Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function(){
  Route::get('home', 'HomeController@admin')->name('admin.home');
  Route::put('actions/{id}/approve', 'API\Admin\ActionsController@putApproveAction');
  Route::put('actions/{id}/deny', 'API\Admin\ActionsController@putDenyAction');
});