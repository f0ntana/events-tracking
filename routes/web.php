<?php

use App\Http\Controllers\EventController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('layouts.app');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get(
    '/tracking',
    [\App\Http\Controllers\TrackingController::class, 'index']
)->name('traking');

Route::resource('events', 'EventController')->names('events');
