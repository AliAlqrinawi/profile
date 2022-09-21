<?php

use App\Http\Controllers\Services\ServicesController;
use Illuminate\Support\Facades\Route;



Route::group(  [
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => ['auth']
] , function (){
    Route::controller(ServicesController::class)->group(function () {
        Route::get('admin/service/index' , 'index')->name('service.index');

        Route::get('admin/get_service' , 'get_service')->name('service.get_service');

        Route::get('admin/service' , 'create')->name('service.create');

        Route::post('admin/service' ,  'store')->name('service.store');

        Route::get('admin/service/edite/{id}' ,  'edite')->name('service.edite');

        Route::put('admin/service/update/{id}' ,  'update')->name('service.upload');

        Route::delete('admin/service/delete/{id}' ,  'destroy')->name('service.destroy');
    });
});
