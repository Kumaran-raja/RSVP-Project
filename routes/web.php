<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\EventController;
use App\Livewire\EventList;
use App\Models\Event;
use Illuminate\Support\Facades\Route;

//Route::get('/', function () {
//    return view('welcome');
//});
//Route::get('/', function () {
//    $events = Event::orderBy('date', 'asc')->get();
//    return view('welcome', compact('events'));
//});
Route::get('/', function () {
    $events = Event::orderBy('date', 'asc')->get(); // Fetch events sorted by date
    return view('welcome', compact('events')); // Pass the events to the welcome view
});


Route::post('/events', [EventController::class, 'store'])->name('events.store');
Route::get('/project', EventList::class);
Route::get('/register', function () {
    return view('register');
})->name('register.form');


Route::get('/event-list', EventList::class)->name('event.list');
// Handle form submission (POST request)
Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::get('/login', function () {
    return view('login');
})->name('login.form');

Route::post('/login', [AuthController::class, 'login'])->name('login');

