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



Route::group(['middleware'=>'admin'],function (){

    Route::get('/admin',function (){
        return view('admin.index');
    });

    //user
    Route::get('/admin/users','AdminUsersController@index')->name('admin.users.index');
    Route::get('/admin/users/create','AdminUsersController@create')->name('admin.users.create');
    Route::post('/admin/users/store','AdminUsersController@store')->name('admin.users.store');
    Route::get('/admin/users/{user}/edit','AdminUsersController@edit')->name('admin.users.edit');
    Route::put('/admin/users/{user}','AdminUsersController@update')->name('admin.users.update');
    Route::delete('/admin/users/{user}','AdminUsersController@destroy');
    //post
    Route::get('/admin/posts','AdminPostsController@index')->name('admin.posts.index');
    Route::get('/admin/posts/create','AdminPostsController@create')->name('admin.posts.create');
    Route::post('/admin/posts/store','AdminPostsController@store')->name('admin.posts.store');
    Route::get('/admin/posts/{user}/edit','AdminPostsController@edit')->name('admin.posts.edit');
    Route::put('/admin/posts/{user}','AdminPostsController@update')->name('admin.posts.update');
    Route::delete('/admin/posts/{user}','AdminPostsController@destroy');

});

Route::get('/home', 'HomeController@index')->name('home');
