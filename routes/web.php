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

Route::group(['middleware'=>'web'], function()
{
	Route::get('/', 'PagesController@index');

Route::get('/about', 'PagesController@about');
Route::get('/blog/{slug}',['as'=>'blog.slug','uses'=>'BlogController@singleblog']);
Route::get('/blog',['as'=>'blog.index','uses'=>'BlogController@index']);
Route::get('/contact', 'PagesController@contact');
Route::post('/contact', ['uses'=>'PagesController@postcontact','as'=>'contact.post']);
Route::resource('posts','PostController');


Route::resource('categories','CategoryController',['except'=>'create']);
Route::resource('tags','TagController',['except'=>'create']);
Route::post('comments/{id}',['uses'=>'CommentController@store','as'=>'comments.store']);
Route::get('comments/{id}/edit',['uses'=>'CommentController@edit','as'=>'comments.edit']);
Route::put('comments/{id}',['uses'=>'CommentController@update','as'=>'comments.update']);
Route::delete('comments/{id}',['uses'=>'CommentController@destroy','as'=>'comments.destroy']);
Route::get('comments/{id}/delete',['uses'=>'CommentController@delete','as'=>'comments.delete']);

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
});
