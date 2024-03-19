<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterUserController;
use App\Http\Controllers\Auth\RegisteredUserController;



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


Route::middleware('auth')->group(function () {
    Route::get('/', [RegisterUserController::class, 'index']);
    });

Route::post('/work/start', 'WorkController@startWork');
Route::post('/work/end', 'WorkController@endWork');
Route::post('/break/start', 'WorkController@startBreak');
Route::post('/break/end', 'WorkController@endBreak');