<?php

use App\Http\Controllers\CategoryOfWorkers\CategoryOfWorkersController;
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
// Route::get('/al', function(){
//     return view('Dashboard.profile');
// })->middleware(['auth']);

Route::get('/a', [CategoryOfWorkersController::class , 'getsumm'])->middleware(['auth']);
Route::post('/aa', [CategoryOfWorkersController::class , 'summ'])->middleware(['auth']);
require __DIR__.'/index.php';
require __DIR__.'/auth.php';
require __DIR__.'/setting.php';
require __DIR__.'/service.php';
require __DIR__.'/adminanduser.php';
require __DIR__.'/categores.php';
require __DIR__.'/works.php';
require __DIR__.'/roles.php';
