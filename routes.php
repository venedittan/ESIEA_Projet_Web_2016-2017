<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/
Route::when('*','csrf',['post','put','delete']);
Route::get('/',['as'=>'home','uses'=>'PostsController@index']);
Route::get('/posts/{slug}',['as'=>'posts.show','uses'=>'PostsController@show']);
Route::get('logout',['as'=>'users.logout','uses'=>'UserController@logout']);

Route::group(['before'=>'admin'],function(){
  Route::get('admin',['as'=>'home.admin','uses'=>'HomeController@admin']);
  Route::get('admin/posts',['as'=>'posts.admin','uses'=>'PostsController@admin']);
  Route::get('admin/posts/{id}',['as'=>'posts.edit','uses'=>'PostsController@edit']);
  Route::delete('admin/posts/delete/{id}',['as'=>'posts.delete','uses'=>'PostsController@delete']);
  Route::post('admin/posts/update/{id}',['as'=>'posts.update','uses'=>'PostsController@update']);
  Route::post('admin/posts/create',['as'=>'posts.create','uses'=>'PostsController@create']);
  Route::post('admin/posts/store',['as'=>'posts.store','uses'=>'PostsController@store']);
  Route::get('admin/comments',['as'=>'comments.admin','uses'=>'CommentsController@admin']);
  Route::delete('admin/comments/delete/{id}',['as'=>'comments.delete','uses'=>'CommentsController@delete']);
  Route::get('admin/users',['as'=>'users.admin','uses'=>'UserController@admin']);
  Route::delete('admin/users/{id}',['as'=>'users.delete','uses'=>'UserController@delete']);
  Route::post('admin/permission/{id}',['as'=>'users.permission','uses'=>'UserController@permission']);

});

Route::group(['before'=>'guest'],function(){
  Route::get('register',['as'=>'users.register','uses'=>'UserController@register']);
  Route::get('login',['as'=>'users.login','uses'=>'UserController@login']);
  Route::post('check',['as'=>'users.check','uses'=>'UserController@check']);
  Route::post('store',['as'=>'users.store','uses'=>'UserController@store']);
});

Route::group(['before'=>'auth'],function(){
  Route::post('posts/{id}/comments/create',['as'=>'comments.create','uses'=>'CommentsController@create']);
});
