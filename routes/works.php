<?php

use App\Http\Controllers\Works\WorksController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

Route::group(  [
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => ['auth']
] , function (){
    Route::controller(WorksController::class)->group(function () {
        Route::get('admin/works/index', 'index')->name('work.index');

        Route::get('admin/get_works', 'get_works')->name('work.get_works');

    Route::get('admin/works/create', 'create')->name('work.create');

    Route::post('admin/works', 'store')->name('work.store');

    Route::get('admin/works/edite/{id}', 'edite')->name('work.edite');

    Route::put('admin/works/update/{id}', 'update')->name('work.update');

    Route::delete('admin/works/destroy/{id}',  'destroy_work')->name('work.destroy');

    Route::delete('admin/attachment/destroy/{id}', 'destroy_attachment')->name('attachment.destroy');
    });
});
