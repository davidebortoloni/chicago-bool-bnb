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

Auth::routes(['register' => false]);

Route::middleware('auth')->name('admin.')->prefix('admin')->namespace('Admin')->group(function () {
    Route::get('/', 'DashboardController@index')->name('dashboard');
    Route::get('payments/{apartment}/{sponsorship}', 'PaymentsController@index')->name('payments.index');
    Route::get('payments/transaction', 'PaymentsController@transaction')->name('payments.transaction');
    Route::resource('apartments', 'ApartmentController');
    Route::resource('sponsorships', 'SponsorshipController');
    Route::get('sponsorships/purchase/{apartment}', 'SponsorshipController@purchase')->name('sponsorships.purchase');
    Route::resource('services', 'ServiceController');
    Route::resource('users', 'UserController');
});

Route::get('{any?}', function () {
    return view('guest.home');
})->where('any', '.*');
