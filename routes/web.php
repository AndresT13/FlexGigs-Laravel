<?php


use App\Http\Controllers\ContactController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StaticPageController;
use App\Http\Controllers\HelpController;

use App\Http\Controllers\TermsController;

use App\Http\Controllers\PrivacyController;
use App\Http\Controllers\IndexController;


Route::get('/', [IndexController::class, 'index'])->name('index');

Route::post('/contacto', [ContactController::class, 'send'])->name('contact.send');
Route::post('/contacto', [ContactController::class, 'send'])->name('contact.send');

Route::post('/login', [LoginController::class, 'login'])->name('login.login');
Route::get('/help', [HelpController::class, 'index'])->name('help');

Route::get('/privacy', [PrivacyController::class, 'index'])->name('privacy');
Route::get('/terms', [TermsController::class, 'index'])->name('terms');
Route::get('/login', [StaticPageController::class, 'login'])->name('login');

#Route::post('/contact/send', [ContactController::class, 'send'])->name('contact.send');
