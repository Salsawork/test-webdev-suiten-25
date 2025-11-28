<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BankController;
use App\Http\Controllers\PositionController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\ShiftController;
use App\Http\Controllers\AuthController;

Route::get('/', [AuthController::class, 'showLogin'])->name('login');
Route::post('/', [AuthController::class, 'login'])->name('login.process');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::prefix('master/banks')->name('banks.')->group(function () {
    Route::get('/', [BankController::class, 'index'])->name('index');
    Route::get('/create', [BankController::class, 'create'])->name('create');
    Route::post('/store', [BankController::class, 'store'])->name('store');
    Route::get('/{bank}/edit', [BankController::class, 'edit'])->name('edit');
    Route::post('/{bank}/update', [BankController::class, 'update'])->name('update');
    Route::delete('/{bank}/delete', [BankController::class, 'destroy'])->name('delete');
});

Route::prefix('master/positions')->name('positions.')->group(function () {
    Route::get('/', [PositionController::class, 'index'])->name('index');
    Route::get('/create', [PositionController::class, 'create'])->name('create');
    Route::post('/store', [PositionController::class, 'store'])->name('store');
    Route::get('/{position}/edit', [PositionController::class, 'edit'])->name('edit');
    Route::post('/{position}/update', [PositionController::class, 'update'])->name('update');
    Route::delete('/{position}/delete', [PositionController::class, 'destroy'])->name('delete');
});

Route::prefix('master/shifts')->name('shifts.')->group(function () {
    Route::get('/', [ShiftController::class, 'index'])->name('index');
    Route::get('/create', [ShiftController::class, 'create'])->name('create');
    Route::post('/store', [ShiftController::class, 'store'])->name('store');
    Route::get('/{position}/edit', [ShiftController::class, 'edit'])->name('edit');
    Route::post('/{position}/update', [ShiftController::class, 'update'])->name('update');
    Route::delete('/{position}/delete', [ShiftController::class, 'destroy'])->name('delete');
});

Route::prefix('master/employees')->name('employees.')->group(function () {
    Route::get('/', [EmployeeController::class, 'index'])->name('index');
    Route::get('/create', [EmployeeController::class, 'create'])->name('create');
    Route::post('/store', [EmployeeController::class, 'store'])->name('store');
    Route::get('/{employee}/edit', [EmployeeController::class, 'edit'])->name('edit');
    Route::put('/{employee}/update', [EmployeeController::class, 'update'])->name('update');
    Route::delete('/{employee}/delete', [EmployeeController::class, 'destroy'])->name('delete');
});

Route::prefix('attendances')->name('attendances.')->group(function () {
    Route::get('/', [AttendanceController::class, 'index'])->name('index');
    Route::get('/create', [AttendanceController::class, 'create'])->name('create');
    Route::post('/store', [AttendanceController::class, 'store'])->name('store');
    Route::get('/{attendance}/edit', [AttendanceController::class, 'edit'])->name('edit');
    Route::post('/{attendance}/update', [AttendanceController::class, 'update'])->name('update');
    Route::delete('/{attendance}/delete', [AttendanceController::class, 'destroy'])->name('delete');
});