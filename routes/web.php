<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
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


Auth::routes(['register' => false]);


Route::get('/', [HomeController::class, 'index'])->withoutMiddleware('auth')->name('index');

Route::prefix('admin')->middleware(['auth', 'isAdmin'])->group(function() {
    Route::get('/', [AdminController::class, 'index'])->name('admin');

    Route::put('/judul/{id}', [AdminController::class, 'update'])->name('judul.update');
});
