<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TrackController;
use Illuminate\Support\Str;
use App\Models\Target;
use Illuminate\Support\Facades\Auth;

Route::get('/track/{id}', [TrackController::class, 'showTargetPage']);
Route::post('/track/{id}', [TrackController::class, 'storeLocation']);
Route::get('/dashboard', [TrackController::class, 'dashboard']);

Route::get('/s/{slug}', [TrackController::class, 'handleShortLink']);

Route::get('/generate-link', function () {
    $id = Str::uuid();
    $slug = Str::random(8);
    Target::create(['id' => $id, 'slug' => $slug]);
    return url("/s/$slug");
});

Route::get('/login', [App\Http\Controllers\AuthController::class, 'loginPage'])->name('login');
Route::post('/login', [App\Http\Controllers\AuthController::class, 'login']);
Route::post('/logout', [App\Http\Controllers\AuthController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [TrackController::class, 'dashboard']);
    Route::delete('/target/{id}', [TrackController::class, 'deleteTarget'])->name('target.delete');
    Route::get('/target/{id}/edit', [TrackController::class, 'editTarget'])->name('target.edit');
    Route::put('/target/{id}', [TrackController::class, 'updateTarget'])->name('target.update');
});