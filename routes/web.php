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

// Route::get('/', function () {
//     return view('welcome');
// });

// use Symfony\Component\Routing\Route;
use Illuminate\Support\Facades\Route;


Route::get('/', 'PostsController@index');
// Route::get('/posts/{id}', 'PostsController@show');
Route::get('/posts/{post}', 'PostsController@show')->where('post', '[0-9]+');
Route::get('/posts/create', 'PostsController@create')->middleware('auth');
Route::post('/posts', 'PostsController@store')->middleware('auth');
Route::get('/posts/{post}/edit', 'PostsController@edit')->middleware('auth');
Route::patch('/posts/{post}', 'PostsController@update')->middleware('auth');
Route::delete('/posts/{post}', 'PostsController@destroy')->middleware('auth');
Route::post('/posts/{post}/comments', 'CommentsController@store');
Route::delete('/posts/{post}/comments/{comment}', 'CommentsController@destroy')->middleware('auth');


Route::get('/manage', 'PostsController@manageIndex')->middleware('auth');
Route::get('/manage/{post}', 'PostsController@manageShow')->where('post', '[0-9]+')->middleware('auth');
// where~: パラメータを正規表現でバリデーションしてる(今回は数字かどうかチェック。)

//Good機能
Route::get('/posts/good/{post}', 'PostsController@increaseGood');
Route::get('/posts/notgood/{post}', 'PostsController@decreaseGood')->middleware('auth');;

//認証機能で追加されたRoute
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
//Googleログイン
Route::get('login/google', 'Auth\LoginController@redirectToGoogle');
Route::get('login/google/callback', 'Auth\LoginController@handleGoogleCallback');