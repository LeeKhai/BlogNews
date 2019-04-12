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
Route::get('/home', 'HomeController@index')->name('home');

Route::get('/getCurrentUser', function () {
    return Auth::user()->load('roles');
});

Route::get('/', function () {
    return view('welcome.home.index');
});
Route::get('/a', function () {
    return view('welcome.home.categoryNews');
});
Route::group(['namespace' => 'Api\V1', 'as' => 'api.'], function () {
    Route::get('/news/{slug}', 'NewsController@showNews');
});

// Route::get('/news/{slug}', function () {
//     return view('welcome.home.single');
// });

// Route::group(['prefix' => 'welcome'], function () {
//     Route::get('/show/{id}', 'NewsController@show');
// });



// Route::get('/', 'NewsController@index');
// Route::get('/news', 'NewsController@index')->name('list_news');
// Route::group(['prefix' => 'news'], function () {
//     Route::get('/drafts', 'NewsController@drafts')
//         ->name('list_drafts')
//         ->middleware('auth');
//     Route::get('/show/{id}', 'NewsController@show')
//         ->name('show_news');
//     Route::get('/create', 'NewsController@create')
//         ->name('create_news')
//         ->middleware('can:news.create');
//     Route::post('/create', 'NewsController@store')
//         ->name('store_news')
//         ->middleware('can:news.create');
//     Route::get('/edit/{news}', 'NewsController@edit')
//         ->name('edit_news')
//         ->middleware('can:news.update,news');
//     Route::post('/edit/{news}', 'NewsController@update')
//         ->name('update_news')
//         ->middleware('can:news.update,news');
//     Route::get('/publish/{news}', 'NewsController@publish')
//         ->name('publish_news')
//         ->middleware('can:news.publish');
// });



// Auth::routes();

// Route::get('/', 'IndexController@index');
// Route::get('search',['as'=>'search', 'uses'=>'IndexController@search']);
// Route::get('/postList/{id}', 'IndexController@posts')->name('postList');
// Route::get('/singlePost/{id}', 'IndexController@show')->name('singlePost');

// Route::get('/home', 'HomeController@index')->name('home');

// Route::group(['prefix' => 'api'],function () {
//     Route::apiResources([
//         'categories' => 'Api\CategoryController',
//         'posts' => 'Api\PostController',
//         'users' => 'Api\UserController',
//         'tags'  => 'Api\TagController',
//     ]);
//     Route::get('/draft', 'api\postcontroller@draft')->name('posts.draft')->middleware('auth');;
//     // Route::get('/create', 'api\postcontroller@create')->name('create_post')->middleware('can:post.create');
//     Route::post('/posts/create', 'api\postcontroller@store')->middleware('can:post.create');
//     Route::get('/publish/{id}', 'api\postcontroller@publish')->middleware('can:post.publish');
// });
// Route::get('/admin/{vue?}', function () {
//     return view('dashboard');
// })->where('vue', '[\/\w\.-]*')->middleware('auth');
