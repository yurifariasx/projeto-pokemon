<?php

use App\Http\Controllers\CoachController;
use App\Http\Controllers\PokemonController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('pokemon', [PokemonController::class, 'index'])
->middleware(['auth', 'verified'])->name('index-pokemon');
Route::get('pokemon/create', [PokemonController::class, 'create'])
->middleware(['auth', 'verified'])->name('create-pokemon');
Route::post('pokemon', [PokemonController::class, 'store'])
->middleware(['auth', 'verified'])->name('store-pokemon');
Route::get('pokemon/{id}/edit', [PokemonController::class, 'edit'])
->middleware(['auth', 'verified'])->name('edit-pokemon');
Route::put('pokemon/{id}', [PokemonController::class, 'update'])
->middleware(['auth', 'verified'])->name('update-pokemon');
Route::delete('pokemon/{id}', [PokemonController::class, 'destroy'])
->middleware(['auth', 'verified'])->name('destroy-pokemon');

Route::get('coaches', [CoachController::class, 'index']);
Route::get('coaches/create', [CoachController::class, 'create']);
Route::post('coaches', [CoachController::class, 'store']);
Route::get('coaches/{id}/edit', [CoachController::class, 'edit']);
Route::put('coaches/{id}', [CoachController::class, 'update']);
Route::delete('coaches/{id}', [CoachController::class, 'destroy']);


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
