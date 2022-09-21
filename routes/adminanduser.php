<?php

use App\Http\Controllers\UserAndAdmin\UsersAndAdminController;
use Illuminate\Support\Facades\Route;


Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['auth']
] , function (){
    Route::controller(UsersAndAdminController::class)->group(function () {
        Route::get('admins', 'admin')->name('admin');

        Route::get('get_admins', 'get_admins')->name('get_admins');

        Route::get('clients' , 'clients')->name('clients');
    });
});
