<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create.blade.php something great!
|
*/



Auth::routes();

Route::get('/','PageController@index');
Route::get('/home','PageController@index');
Route::get('/post/{id}/show','PageController@show');
Route::get('/post/create','PostController@create');
Route::post('/post/create','PostController@store');
Route::get('/post/{id}/detail','PostController@detail');
Route::get('post/detailByMain','PostController@detailByMain');
Route::post('/comment/create','CommentController@store');


//LikeDislike
Route::get('/post/like/{postId}','LikeDislikeController@like');
Route::get('/post/dislike/{postId}','LikeDislikeController@dislike');

//search
Route::get('/search','PostController@search');
Route::get('/searchByCategory/{cat_id}','PostController@searchByCat');




//About
Route::get('/about','AboutController@index');

//Update
Route::get('/update','UpdateController@index');

//Middleware
Route::group(array('prefix'=>'admin','middleware'=>['admin']),function(){
    Route::get('/admin','Admin\UserController@index');
    //user
    Route::get('/user','Admin\UserController@index');
    Route::get('/user/{id}/edit','Admin\UserController@edit');
    Route::post('/user/{id}/edit','Admin\UserController@update');
    Route::get('/user/{id}/delete','Admin\UserController@delete');
    //category
    Route::get('/category','Admin\CategoryController@index');
    Route::get('/category/{id}/edit','Admin\CategoryController@edit');
    Route::post('/category/{id}/edit','Admin\CategoryController@update');
    Route::get('/category/{id}/delete','Admin\CategoryController@delete');
    Route::get('/category/add','Admin\CategoryController@show');
    Route::post('/category/add','Admin\CategoryController@create');
    //Article
    Route::get('/article','Admin\ArticleController@index');
    Route::get('/article/{id}/edit','Admin\ArticleController@edit');
    Route::post('/article/{id}/edit','Admin\ArticleController@update');
    Route::get('/article/{id}/delete','Admin\ArticleController@destroy');
});





