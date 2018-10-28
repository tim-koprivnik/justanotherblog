<?php

use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Mail;

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
// Route::get('/home', ['as'=>'justanotherblog.home', 'uses'=>'HomeController@index']);


//For admin(s) only
Route::group(['middleware'=>'admin'], function() {
    Route::get('/admin', 'AdminController@index');
    Route::resource('/admin/dashboard', 'DashboardController');
    Route::resource('/admin/users', 'UsersController');
    Route::resource('/admin/posts', 'PostsController');
    Route::resource('/admin/categories', 'CategoriesController');
    Route::resource('/admin/media', 'MediaController');
        Route::post('/admin/delete/media', 'MediaController@deleteMedia');
    Route::resource('/admin/comments', 'CommentsController');
    Route::resource('/admin/comments/replies', 'CommentsRepliesController');
});


//For everyone
Route::get('/post/{slug}', ['as'=>'justanotherblog.post', 'uses'=>'PostsController@post']);

Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

Route::get('/search', function(Request $request) {
    $results = App\Post::search($request->search)->get();
    return view('layouts.search-results', compact('results'));
});