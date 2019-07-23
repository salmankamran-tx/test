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

Route::get('testing-branch', 'Controller@testing');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', 'PostController@home');

Route::resource('/posts', 'PostController');

// Route for delete and edit beacuse we could not tell laravel that we are doing delete request because we are using vue.
Route::post('/deletePost/{id}', 'PostController@destroy');
Route::post('/editPost/{id}', 'PostController@edit');

// Route::get('/skills', function(){
//
//     return ['Laravel' , 'Vue' , 'Done'];
//
// });
