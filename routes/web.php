<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\DashboardController;
use Dompdf\Dompdf;

Route::get('/', function () {
    return view('index');
});

Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('login', [AuthController::class, 'login'])->name('login.post');
Route::get('register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('register', [AuthController::class, 'register'])->name('register.post');
Route::post('logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/admin', [DashboardController::class, 'dashboard'])->middleware('auth')->name('admin');

Route::resource('transactions', TransactionController::class);

Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');

// Rute untuk cetak PDF

Route::get('/transactions/print', [TransactionController::class, 'print'])->name('transactions.print');
