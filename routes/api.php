<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\GameRestController;
use App\Http\Controllers\API\GenreRestController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
| 
    GET /games - vrati sve igre iz baze - index
    GET /games/{id} - vrati igru sa datim id -jem - show
    POST /games - kreiraj igru - store
    PUT/PATCH - /games/{id} - update igru sa datim id - jem  - update
    DELETE /games/{id} - obrisi igru sa datim id  -jem - destroy
*/

Route::apiResources([
    'games' => GameRestController::class,
    'genres' => GenreRestController::class,
]);