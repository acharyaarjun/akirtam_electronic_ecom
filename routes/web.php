<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiteController;

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

Route::get('/', [SiteController::class, 'getHome'])->name('getHome');
Route::get('/about', [SiteController::class, 'getAbout'])->name('getAbout');
Route::get('/service', [SiteController::class, 'getService'])->name('getService');
Route::get('/contact', [SiteController::class, 'getContact'])->name('getContact');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
