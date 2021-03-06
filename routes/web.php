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

Route::get('/', function(){

    if (Auth::check()) return redirect()->route('home');
    return view('welcome');
}); 

Route::get('/login', 'Auth\LoginController@redirectToProvider')->name('login');;
Route::get('/login/callback', 'Auth\LoginController@handleProviderCallback');
Route::post('/logout', 'Auth\LoginController@logout')->name('logout');

Route::get('/home', 'PageController@index')->name('home');
Route::post('/html-template', 'PageController@getHtmlTemplate');
Route::get('/sample-mail', 'PageController@getSampleEmail');
