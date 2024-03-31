<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterUserController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\AuthenticatedSessionController;
use App\Http\Controllers\WorkController;
use App\Http\Controllers\AttendController;
use Illuminate\Http\Request;




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

Route::get('/register', [RegisteredUserController::class, 'create'])
    ->middleware(['guest'])
    ->name('register');

Route::post('/register', [RegisteredUserController::class, 'store'])
    ->middleware(['guest']);

Route::get('/login', [AuthenticatedSessionController::class, 'create'])
    ->middleware(['guest'])
    ->name('login');

Route::post('/login', [AuthenticatedSessionController::class, 'store'])
    ->middleware(['guest']);


Route::middleware('auth')->group(function () {
    Route::get('/', [RegisterUserController::class, 'index']);

    // Work Start ルート
    Route::post('/work/start', [WorkController::class, 'workStart'])->name('work.start');

    // Work End ルート
    Route::post('/work/end', [WorkController::class, 'workEnd'])->name('work.end');

    // Break Start ルート
    Route::post('/break/start', [WorkController::class, 'breakStart'])->name('break.start');

    // Break End ルート
    Route::post('/break/end', [WorkController::class, 'breakEnd'])->name('break.end');

    Route::get('/attendance', [AttendController::class, 'admin'])->name('attendance');
});


