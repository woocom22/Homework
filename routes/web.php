<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::group(['middleware' => 'auth' , 'admin'] , function(){
    Route::get('/admin', 'App\Http\Controllers\HomeController@admin');
    Route::get('/admin/category', 'App\Http\Controllers\CategoryController@index')->name('category.index');
    Route::post('/admin/category/store', 'App\Http\Controllers\CategoryController@store')->name('category.store');
    Route::post('/admin/category/update', 'App\Http\Controllers\CategoryController@update')->name('category.update');
    Route::get('/admin/category/create', 'App\Http\Controllers\CategoryController@create')->name('category.create');
    Route::get('/admin/category/edit/{id}', 'App\Http\Controllers\CategoryController@edit')->name('category.edit');
    Route::get('/admin/category/delete/{id}', 'App\Http\Controllers\CategoryController@delete')->name('category.delete');

    // Router for post
    Route::resource('posts', 'App\Http\Controllers\postController');

});

Route::get('/home', 'App\Http\Controllers\HomeController@home')->name('home');

Route::get('/', function () {

    return view('frontend.index');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/redirect', function () {
        return view('dashboard');
    })->name('dashboard');
});

// frontend route

Route::get('about', 'App\Http\Controllers\HomeController@about')->name('about');
Route::get('contact', 'App\Http\Controllers\HomeController@contact')->name('contact');
Route::get('single-post', 'App\Http\Controllers\HomeController@singlePost')->name('singlePost');
Route::get('category', 'App\Http\Controllers\HomeController@category')->name('category');
