<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

use App\Http\Controllers\GameController;
use App\Http\Controllers\Admin\GameController as AdminGameController;
use App\Http\Controllers\Admin\AdminMLBBController;
use App\Http\Controllers\Admin\AdminMLBBItemController;
use App\Http\Controllers\Admin\AdminMLBBHeroController;


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/', [GameController::class, 'index'])->name('home');
Route::get('/{slug}', [GameController::class, 'show'])->name('game.show');



Route::prefix('admin')->middleware(['auth', 'admin'])->group(function () {
    Route::resource('games', AdminGameController::class);
    Route::get('dashboard', [AdminGameController::class, 'dashboard'])->name('admin.dashboard');
    
    Route::get('{slug}/dashboard', [AdminGameController::class, 'gameAdminPanel'])->name('admin.dashboard');

    

});


// MLBB admin routes
Route::prefix('admin/mlbb')->group(function () {
    Route::get('dashboard', [AdminMLBBController::class, 'dashboard'])->name('admin.mlbb.dashboard');    
});



Route::prefix('admin/mlbb')->name('admin.mlbb.')->group(function () {
    Route::resource('heroes', App\Http\Controllers\Admin\MLBB\HeroController::class);
    Route::resource('items', App\Http\Controllers\Admin\MLBB\ItemController::class);
    Route::resource('emblems', App\Http\Controllers\Admin\MLBB\EmblemController::class);
    // Route::get('{id}/weakness', [App\Http\Controllers\Admin\MLBB\HeroController::class, 'weakness'])->name('heroes.weakness');
    
    Route::get('heroes/{id}/additional-data', [App\Http\Controllers\Admin\MLBB\HeroAdditionalDataController::class, 'index'])->name('heroes.additional-data'); 
    Route::post('heroes/{id}/additional-data.store', [App\Http\Controllers\Admin\MLBB\HeroAdditionalDataController::class, 'store'])->name('heroes.additional-data.store'); 
    Route::post('heroes/{id}/additional-data.edit', [App\Http\Controllers\Admin\MLBB\HeroAdditionalDataController::class, 'edit'])->name('heroes.additional-data.edit'); 
    Route::get('heroes/{id}/emblem', [App\Http\Controllers\Admin\MLBB\HeroEmblemController::class, 'index'])->name('heroes.emblem'); 
    Route::post('heroes/{id}/emblem', [App\Http\Controllers\Admin\MLBB\HeroEmblemController::class, 'store'])->name('heroes.emblem.store'); 
    Route::post('heroes/{id}/emblem-update', [App\Http\Controllers\Admin\MLBB\HeroEmblemController::class, 'update'])->name('heroes.emblem.update');

    Route::get('heroes/{id}/build', [App\Http\Controllers\Admin\MLBB\HeroBuildController::class, 'index'])->name('heroes.build'); 
    Route::post('heroes/{id}/build', [App\Http\Controllers\Admin\MLBB\HeroBuildController::class, 'store'])->name('heroes.build.store'); 
    Route::post('heroes/{id}/build-update', [App\Http\Controllers\Admin\MLBB\HeroBuildController::class, 'update'])->name('heroes.build.update');
    Route::get('heroes/{id}/detail', [App\Http\Controllers\Admin\MLBB\HeroDetailController::class, 'index'])->name('heroes.detail'); 
});

Route::prefix('admin/mlbb/hero')->name('admin.mlbb.hero.')->group(function () {
    // Route::resource('item-counters', App\Http\Controllers\Admin\MLBB\HeroItemCounterController::class);
    // Route::resource('item-builds', App\Http\Controllers\Admin\MLBB\ItemBuildController::class);
    // // Route::resource('weaknesses', App\Http\Controllers\Admin\MLBB\HeroWeaknessController::class);
    // Route::resource('strengths', App\Http\Controllers\Admin\MLBB\HeroStrengthController::class);
    // Route::resource('emblems', App\Http\Controllers\Admin\MLBB\HeroEmblemController::class);

    
    // Route::get('{id}/weaknesses.index', [App\Http\Controllers\Admin\MLBB\HeroWeaknessController::class, 'index'])->name('weaknesses.index');
    // Route::post('{id}/weaknesses.store', [App\Http\Controllers\Admin\MLBB\HeroWeaknessController::class, 'store'])->name('weaknesses.store');
    // Route::post('weaknesses.edit', [App\Http\Controllers\Admin\MLBB\HeroWeaknessController::class, 'edit'])->name('weaknesses.edit');
});
