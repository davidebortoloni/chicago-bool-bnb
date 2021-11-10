<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


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

Auth::routes();

Route::get('/', 'HomeController@index')->name('welcome');
Route::resource('/apartments', 'Admin\ApartmentController');
Route::middleware('auth')->group(function () {
    Route::get('/home', 'Homecontroller@index')->name('home');
});

Route::middleware('auth')->name('admin.')->prefix('admin')->namespace('Admin')->group(function () {
    Route::resource('sponsorships', 'SponsorshipController');
    Route::resource('services', 'ServiceController');
});

Route::get('/profile', 'Admin\ProfileController@index')->name('profile');
