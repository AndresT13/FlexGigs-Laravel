<?php

use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('main-page.index');
});


Route::post('/contacto', [ContactController::class, 'send'])->name('contact.send');

#Route::post('/contact/send', [ContactController::class, 'send'])->name('contact.send');
