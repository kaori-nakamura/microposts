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

//新規登録
Route::get('signup', 'Auth\LoginController@showLoginForm')->name('signup.get');
Route::post('signup', 'Auth\LoginController@login')->name('signup.post');

//ログイン認証
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login')->name('login.post');
Route::get('logout', 'Auth\LoginController@logout')->name('logout.get');

//　ユーザ機能
Route::group(['middleware' => ['auth']], function() {
    Route::resource('users', 'UsersController', ['only' => ['index', 'show']]);
});