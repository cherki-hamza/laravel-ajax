<?php

use Illuminate\Support\Facades\Route;

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
Route::get('/' , 'backend\AjaxController@index')->name('ajax.index');
Route::resource('/posts' , 'backend\PostsController');



// this is just for course test
Route::get('/course' , 'frontend\SiteController@index')->name('course');


// routes with ajax
//Route::get('/ajax' , 'backend\AjaxController@index')->name('ajax.index');
Route::get('/ajax/create' , 'backend\AjaxController@create')->name('ajax.create');
Route::post('/ajax/store' , 'backend\AjaxController@store')->name('ajax.store');
Route::post('/ajax/delete' , 'backend\AjaxController@delete')->name('ajax.delete');

Route::get('/ajax/edit/{post_id}' , 'backend\AjaxController@edit')->name('ajax.edit');
Route::post('/ajax/update' , 'backend\AjaxController@update')->name('ajax.update');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// socialite register and signup
Route::get('redirect/{service}' , 'frontend\SocialController@redirect');
Route::get('callback/{service}' , 'frontend\SocialController@callback');
