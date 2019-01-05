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
// Frontend Routes
Route::get('/', 'PostController@index')->name('blog');
Route::get('/blog/{post}', 'PostController@show')->name('blog.show');
Route::get('/category/{category}', 'CategoryController@show')->name('category.show');
Route::get('/author/{author}', 'PostController@author')->name('author');

// Authentication Routes
Auth::routes();

// Home Controller Route
Route::get('/home', 'Backend\HomeController@index')->name('home');

// Backend Routes
Route::namespace('Backend')->name('backend.')->prefix('backend')->group(function () {
    Route::resource('/blog', 'PostController');
});








// dd(app('Illuminate\Contracts\Config\Repository'));
    // dd(Config::get('database.default', 'default'));
    // dd(app('Illuminate\Config\Repository')['database']['default']);
    // dd(app('config')['database']['default']);
    // dd(app()['config']['databse']['default']); it returns null (Maybe there are changes in the api since laravel 5.1)
