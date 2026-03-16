<?php

use App\Http\Controllers\CareerController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ThesisController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth', 'verified')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/thesis', [ThesisController::class, 'index'])->name("theses.index");
    Route::get('/thesis/create', [ThesisController::class, 'create'])->name('theses.create');
    Route::post('/thesis', [ThesisController::class, 'store'])->name('theses.store');
    Route::get('/thesis/{thesis}/edit', [ThesisController::class, 'edit'])->name('theses.edit');
    Route::patch('/thesis/{thesis}', [ThesisController::class, 'update'])->name('theses.update');
    Route::delete('/thesis/{thesis}', [ThesisController::class, 'destroy'])->name('theses.destroy');
    Route::get('/theses/{thesis}', [ThesisController::class, 'show'])->name('theses.show');

    Route::get('/careers', [CareerController::class, 'index'])->name('careers.index');
    Route::get('/careers/create', [CareerController::class, 'create'])->name('careers.create');
    Route::post('/careers', [CareerController::class, 'store'])->name('careers.store');
    Route::get('/careers/{career}/edit', [CareerController::class, 'edit'])->name('careers.edit');
    Route::patch('/careers/{career}', [CareerController::class, 'update'])->name('careers.update');
    Route::delete('/careers/{career}', [CareerController::class, 'destroy'])->name('careers.destroy');

});

require __DIR__.'/auth.php';
