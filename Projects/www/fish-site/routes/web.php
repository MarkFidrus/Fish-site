<?php

use Illuminate\Support\Facades\Route;

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


Route::group(['middleware' => 'web'], function (){
    Route::get('/', '\App\Http\Controllers\HomeController@index')
        ->name('home');


    Route::group(['middleware' => 'auth'], function(){
        Route::resource('profile', '\App\Http\Controllers\ProfileController');
        Route::get('/profile/my_profile', '\App\Http\Controllers\ProfileController@index')
            ->name('my_profile');
        Route::get('/profile/{id}', '\App\Http\Controllers\ProfileController@show')
            ->name('show_profile');
    });

    Route::get('/contact_us', '\App\Http\Controllers\ContactController@contact')
        ->name('contact');
    Route::post('/contact_us', '\App\Http\Controllers\ContactController@send');


    Route::get('/about_us', '\App\Http\Controllers\HomeController@about')
        ->name('about_us');


});

Auth::routes();


Route::get('/logout','\App\Http\Controllers\Auth\LoginController@logout');
