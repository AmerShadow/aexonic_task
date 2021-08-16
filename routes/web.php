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


Route::get('/', function () {
    return view('welcome');
});


Auth::routes();



Route::resource('users', 'AdminRegisterController');
Route::get('users/delete/{id}', 'AdminRegisterController@delete')->name('users.delete');
Route::get('users/status/{id}', 'AdminRegisterController@changeStatus')->name('users.status');



Route::get('/user/logout', 'UserController@logout')->name('user.logout');

Route::get('user/login', 'UserLoginController@loginShow')->name('login.show');

Route::post('/user/login', 'UserLoginController@userLogin')->name('user.login');


Route::get('/user/home', 'UserController@index')->name('user_home');
Route::get('/user/deactivate', 'UserController@deactivate')->name('deactivate');



Route::get('/home', 'HomeController@index')->name('home');


Route::get('/redirect', 'Auth\LoginController@redirectToProvider')->name('google.redirect');
Route::get('/callback', 'Auth\LoginController@handleProviderCallback')->name('google.callback');
