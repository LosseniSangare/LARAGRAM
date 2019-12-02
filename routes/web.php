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

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/profile.show/{user}','profileController@show')->name('profile.show');
Route::get('profile.edit/{user}','profileController@edit')->name('profile.edit');
Route::patch('profile.update/{user}','profileController@')->name('profile.update');
Route::get('posts.create','postController@create')->name('posts.create');
Route::post('posts.create','postController@store')->name('posts.store');
Route::get('posts.show/{post}','postController@show')->name('posts.show');
