<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AreaController;
use App\Http\Controllers\ComputerController;
use App\Http\Controllers\TrainingCenterController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('area/list', [AreaController::class, 'index'])->name('area.index');
Route::get('area/{id}', [AreaController::class, 'show'])->name('area.show');

Route::get('computer/list', [ComputerController::class, 'index'])->name('computer.index');
Route::get('computer/{id}', [ComputerController::class, 'show'])->name('computer.show');

Route::get('training-center/list', [TrainingCenterController::class, 'index'])->name('trainingCenter.index');
Route::get('training-center/{id}', [TrainingCenterController::class, 'show'])->name('trainingCenter.show');