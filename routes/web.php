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

Route::get('/', 'PostController@index');

Route::get('/blog/show', function () {
    return view('blog.show');
});

Route::get('test', 'WelcomeController@test');
Route::get('reports', 'ReportsController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');







// dd(app('Illuminate\Contracts\Config\Repository'));
    // dd(Config::get('database.default', 'default'));
    // dd(app('Illuminate\Config\Repository')['database']['default']);
    // dd(app('config')['database']['default']);
    // dd(app()['config']['databse']['default']); it returns null (Maybe there are changes in the api since laravel 5.1)
