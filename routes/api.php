<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/search-heroes/{hero_name}', [App\Http\Controllers\Api\MLBB\ApiHeroController::class, 'searchHeroes'])->name('api.search-heroes');
Route::get('/search-items', [App\Http\Controllers\Api\MLBB\ApiItemController::class, 'searchItems'])->name('api.search-items');
Route::get('/search-emblems', [App\Http\Controllers\Api\MLBB\ApiEmblemController::class, 'searchEmblems'])->name('api.search-emblems');
Route::get('/get-emblems', [App\Http\Controllers\Api\MLBB\ApiEmblemController::class, 'getEmblemByType'])->name('api.get-emblems');