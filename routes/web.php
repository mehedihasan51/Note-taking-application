<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


//web route

// Route::get('/homepage',[HomeController::class,'view'])->name('home');
Route::get('/home',[NoteController::class,'view'])->name('home');
Route::get('/note',[NoteController::class,'note'])->name('note');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Define a POST route for creating a new note
//api route
Route::post('/notes', [NoteController::class, 'store'])->name('notes.store');
Route::get('/notes/{id}', [NoteController::class, 'edit'])->name('edit');

Route::post('/notes/{id}/update', [NoteController::class, 'update'])->name('notes.updat');

Route::delete('/notes/{id}', [NoteController::class, 'destroy'])->name('notes.destroy');
// Route::get('/search', [NoteController::class, 'search'])->name('search');

require __DIR__.'/auth.php';
