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

Route::get('/admin/{vue?}', 'AdminController@index')->where('vue', '[\/\w\.-]*')->name('admin')->middleware('auth');
//Route::get('/home', 'HomeController@index')->name('home');

Route::get('/getCurrentUser', function () {
    return Auth::user()->load('roles');
});

Route::get('/', function () {
    return view('welcome.home.index');
});


Route::get('search',['as'=>'search', 'uses'=>'Api\V1\NewsController@search']);
Route::post('comment/{id}',['as'=>'comment', 'uses'=>'HomeController@comment']);

Route::group(['namespace' => 'Api\V1', 'as' => 'api.'], function () {
    Route::get('/news/{slug}', 'NewsController@showNews');
    Route::get('/news/category/{id}', 'NewsController@showNewsCategory'); 
});

Route::get('/test', function () {
    return view('test');
});

Route::get('/send', 'SendMessageController@index')->name('send');
Route::post('/postMessage', 'SendMessageController@sendMessage')->name('postMessage');

