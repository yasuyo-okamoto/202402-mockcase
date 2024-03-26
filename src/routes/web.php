<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterUserController;
use App\Http\Controllers\WorkController;
use App\Http\Controllers\AttendController;




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


//Route::get('/register',[RegisteredUserController::class, 'registered']);


//Route::get('/register', [Controller::class, 'authenticated'])->name('auth.login');

Route::middleware('auth')->group(function () {
    Route::get('/', [RegisterUserController::class, 'index']);
    Route::post('/work/start', 'WorkController@ WorkStart');
    Route::post('/work/end','WorkController@WorkEnd');
    Route::post('/break/start', 'WorkController@BreakStart');
    Route::post('/break/end', 'WorkController@BreakEnd');
    Route::get('/attendance', [AttendController::class, 'admin']);
    //Route::get('/attendance', [AttendController::class, 'search']);
    });

