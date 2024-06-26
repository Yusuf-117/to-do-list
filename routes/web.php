<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TasksController;
use App\Http\Controllers\LoginController;
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

Route::group(['middleware' => 'guest'], function () {
    Route::get('/', [LoginController::class,'index'])->name('login');
    Route::post('/login', [LoginController::class,'login']);

});


Route::middleware('auth')->group(function () {
    Route::resource('tasks', TasksController::class);
    Route::post('/logout', [LoginController::class,'logout']);
});
