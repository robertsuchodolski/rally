<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

//Route::get('/', function () {
//    return view('home');
//});

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::group(['middleware' => ['admin']], function () {

    Route::get('/admin/index', ['as'=>'admin.index', 'uses'=>'AdminPanelController@index']);

    Route::resource('/admin/users', 'AdminUsersController');

    Route::resource('/admin/posts', 'AdminPostsController');

    Route::resource('/admin/categories', 'AdminCategoriesController');

    Route::resource('/admin/media', 'AdminMediasController');
});

/*PagesController*/

Route::get('/post/{id}', ['as'=>'home.post', 'uses'=>'PagesController@show']);

Route::get('/', ['as'=>'index', 'uses'=>'PagesController@index']);

Route::get('/gallery', ['as'=>'gallery', 'uses'=>'PagesController@showPhotos']);

Route::get('/about', ['as'=>'about', 'uses'=>'PagesController@about']);


/*Comments routes*/

Route::get('/user/comments', ['as'=>'comments', 'uses'=>'PostCommentsController@userComments']);

Route::get('/user/comments/replies', ['as'=>'replies', 'uses'=>'CommentRepliesController@userReplies']);

Route::resource('/admin/comments', 'PostCommentsController');

Route::resource('/admin/comments/replies', 'CommentRepliesController');



Route::group(['middleware' => ['auth']], function () {

    Route::resource('/user/article', 'ArticleController');

    Route::resource('/user', 'UserProfileController');

    Route::post('comment/reply', 'CommentRepliesController@createReply');

});





