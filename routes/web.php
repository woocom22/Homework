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
