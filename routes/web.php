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
Route::get('/post/{id}', 'AdminPostsController@post')->name('home.post');



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

    //categories
    Route::get('/admin/categories','AdminCategoriesController@index')->name('admin.categories.index');
    Route::get('/admin/categories/create','AdminCategoriesController@create')->name('admin.categories.create');
    Route::post('/admin/categories/store','AdminCategoriesController@store')->name('admin.categories.store');
    Route::get('/admin/categories/{user}/edit','AdminCategoriesController@edit')->name('admin.categories.edit');
    Route::put('/admin/categories/{user}','AdminCategoriesController@update')->name('admin.categories.update');
    Route::delete('/admin/categories/{user}','AdminCategoriesController@destroy');

    //media
    Route::get('/admin/media','AdminMediaController@index')->name('admin.media.index');
    Route::get('/admin/media/create','AdminMediaController@create')->name('admin.media.create');
    Route::post('/admin/media/upload','AdminMediaController@upload')->name('admin.media.upload');
    Route::delete('/admin/media/{user}','AdminMediaController@destroy');

    //post comment
    Route::get('/admin/comments','PostCommentController@index')->name('post.comments.index');
    Route::get('/admin/comments/{post_id}','PostCommentController@show')->name('post.comments.show');
    Route::get('/admin/comments/create','PostCommentController@create')->name('post.comments.create');
    Route::post('/admin/comments/store','PostCommentController@store')->name('post.comments.store');
    Route::get('/admin/comments/{user}/edit','PostCommentController@edit')->name('post.comments.edit');
    Route::put('/admin/comments/{user}','PostCommentController@update')->name('post.comments.update');
    Route::delete('/admin/comments/{user}','PostCommentController@destroy');

    //post comment replies
    Route::get('/admin/comments/replies','CommentRepliesController@index')->name('comment.replies.index');
    Route::get('/admin/comments/replies/create','CommentRepliesController@create')->name('comment.replies.create');
    Route::post('/admin/comments/replies/store','CommentRepliesController@store')->name('comment.replies.store');
    Route::get('/admin/comments/replies/{user}/edit','CommentRepliesController@edit')->name('comment.replies.edit');
    Route::put('/admin/comments/replies/{user}','CommentRepliesController@update')->name('comment.replies.update');
    Route::delete('/admin/comments/replies/{user}','CommentRepliesController@destroy');


});

Route::get('/home', 'HomeController@index')->name('home');

//gives access to logged in users only
Route::group(['middleware'=>'auth'],function (){

    Route::post('comment/reply', 'CommentRepliesController@createReplay')->name('home.auth.replay');

});