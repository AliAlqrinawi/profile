<?php

use App\Http\Controllers\Settings\SettingsController;
use Illuminate\Support\Facades\Route;

Route::group(  [
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => ['auth']
], function (){
    Route::get('admin/setting',  [SettingsController::class  , 'edite_general_settings'])->name('edite.setting.general');

    Route::post('admin/setting',  [SettingsController::class  , 'update_general_settings'])->name('update.setting.general');
});

