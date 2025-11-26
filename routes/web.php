<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;
use App\Http\Controllers\ContactController;
Route::get('/', function () {
    return view('welcome');
});


Route::get('/meeting-events', [EventController::class, 'index'])->name('events.index');
Route::get('/meeting-events/{id}', [EventController::class, 'show'])->name('events.show');
Route::post('/send-email', [ContactController::class, 'sendEmail'])->name('send.email');

