<?php

use App\Http\Controllers\CategoryOfWorkers\CategoryOfWorkersController;
use Illuminate\Support\Facades\Route;



Route::group(  [
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => ['auth']
] , function (){
    Route::controller(CategoryOfWorkersController::class)->group(function () {
        Route::get('categores/works', 'create')->name('categore.create');

        Route::get('get_categories', 'get_categories')->name('get_categories');

        Route::post('categores/works',  'store')->name('categore.store');

        Route::get('categores/edit/{id}', 'edit')->name('categore.edit');

        Route::put('categores/update/{id}', 'update')->name('categore.update');

        Route::delete('categores/destroy/{id}', 'destroy')->name('categore.destroy');
    });
});
