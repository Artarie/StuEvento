<?php

use App\Http\Controllers\EventController;
use App\Http\Controllers\ProfileController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [EventController::class, 'allEvents'], function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

});

Route::prefix('/events')->group(function(){
    Route::get('/', [EventController::class, 'index'])->name('event.index');
    Route::get('/create', [EventController::class, 'create'])->name('event.create');
    Route::post('/', [EventController::class, 'store'])->name('event.store');
    Route::get('/{id}', [EventController::class, 'show'])->name('event.show');
    Route::get('/{id}/register', [EventController::class, 'registerAttendee'])->name('event.register');
    Route::post('/{id}/attendees',  [EventController::class, 'storeAttendee'])->name('event.storeAttendee');
    Route::get('/{id}/edit', [EventController::class, 'edit'])->name('event.edit');
    Route::put('/{id}', [EventController::class, 'update'])->name('event.update');

});






require __DIR__.'/auth.php';
