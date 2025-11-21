<?php

use App\Http\Controllers\NoteController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


// Add resource route to dynamically create routes
Route::resource('notes', NoteController::class);