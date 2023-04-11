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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileControllr::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/events', [EventController::class, 'index'])->name('event.index');

});

Route::prefix('/events', function() {
    Route::get('/',)->name('event.index');
    Route::get('/create',)->name('event.create');
    Route::get('/',)->name('event.store');
    Route::get('/{id}',)->name('event.show');
    Route::get('/{id}/register',)->name('event.register');
    Route::get('/{id}/attendees',)->name('event.storeAttendee');
    Route::get('/{id}/edit',)->name('event.edit');
    Route::put('/{id}',)->name('event.update');



});

require __DIR__.'/auth.php';
