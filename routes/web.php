<?php

use App\Http\Controllers\GeneroController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LibroController;
use App\Models\Genero;

Route::get('/', [LibroController::class, 'index'])->name('libro');

Route::resource('libro', LibroController::class);

Route::get('libros/eliminados', [LibroController::class, 'trashed'])->name('libro.trashed');
Route::get('libros/mis-libros', [LibroController::class, 'mine'])->name('libro.mine');
Route::patch('libros/{id}/restaurar', [LibroController::class, 'restore'])->name('libro.restore');
Route::delete('/libros/{id}/force-delete', [LibroController::class, 'forceDelete'])->name('libro.forceDelete');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', [LibroController::class, 'index']
    )->name('libro');
});
