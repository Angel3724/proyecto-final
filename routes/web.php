<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LibroController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
 
Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
 
    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
 
    return redirect('/');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

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
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
