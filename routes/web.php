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

// Route::get('/admin/{vue?}', function () {
//     return view('welcome');
// })->where('vue', '[\/\w\.-]*');


Auth::routes();

Route::get('/admin/{vue?}', 'AdminController@index')->where('vue', '[\/\w\.-]*')->name('admin');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', function () {
    return view('welcome');
});
Route::get('/getCurrentUser', function() {
    return Auth::user()->load('roles');
 });
