<?php

use Illuminate\Support\Facades\Route;


Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['auth']
    ] , function (){
        Route::controller(\App\Http\Controllers\IndexController::class)->group(function (){
            Route::get('/', 'index')->middleware(['auth'])->name('dashboard');
            Route::get('get_client', 'get_client')->middleware(['auth'])->name('get_client');
        });
});
