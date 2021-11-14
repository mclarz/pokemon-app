<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();

});

Route::middleware(['auth'])->group(function () {

    Route::get('/liked_pokemon', [App\Http\Controllers\PokemonController::class, 'likedPokemon']);
    Route::get('/hate_pokemon',[App\Http\Controllers\PokemonController::class,'hatedPokemon']);
    
    Route::get('/users_pokemon',[App\Http\Controllers\PokemonController::class,'usersPokemon']);

});
