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
