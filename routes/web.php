<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GameController;
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


Route::get('/', [GameController::class,'index']);
Route::get('/newGame', [GameController::class,'newGame']);
Route::post('changeGame/{id}', [GameController::class,'change']);
Route::post('updateGame/{id}', [GameController::class,'update']);
Route::post('/createGame', [GameController::class,'create']);
