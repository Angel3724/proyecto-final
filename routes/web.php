<?php

use App\Http\Controllers\GeneroController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LibroController;
use App\Models\Genero;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('libro', LibroController::class);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
