<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AreaController;
use App\Http\Controllers\ComputerController;
use App\Http\Controllers\TrainingCenterController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('area', [AreaController::class, 'index'])->name('area.index');
Route::get('area/create',[AreaController::class,'create'])->name('area.create');

Route::get('area/{area}', [AreaController::class, 'show'])->name('area.show');
Route::post('area', [AreaController::class, 'store'])->name('area.store');
Route::get('area/{area}/editar',[AreaController::class,'edit'])->name('area.edit');
Route::put('area/{area}', [AreaController::class, 'update'])->name('area.update');
Route::delete('area/{area}', [AreaController::class, 'destroy'])->name('area.destroy');


Route::get('computer', [ComputerController::class, 'index'])->name('computer.index');
Route::get('computer/create', [ComputerController::class, 'create'])->name('computer.create');

Route::get('computer/{computer}', [ComputerController::class, 'show'])->name('computer.show');
Route::post('computer', [ComputerController::class, 'store'])->name('computer.store');
Route::get('computer/{computer}/editar', [ComputerController::class, 'edit'])->name('computer.edit');
Route::put('computer/{computer}', [ComputerController::class, 'update'])->name('computer.update');
Route::delete('computer/{computer}', [ComputerController::class, 'destroy'])->name('computer.destroy');



Route::get('training-center', [TrainingCenterController::class, 'index'])->name('trainingCenter.index');
Route::get('training-center/create', [TrainingCenterController::class, 'create'])->name('trainingCenter.create');

Route::get('training-center/{trainingCenter}', [TrainingCenterController::class, 'show'])->name('trainingCenter.show');
Route::post('training-center', [TrainingCenterController::class, 'store'])->name('trainingCenter.store');
Route::get('training-center/{trainingCenter}/editar', [TrainingCenterController::class, 'edit'])->name('trainingCenter.edit');
Route::put('training-center/{trainingCenter}', [TrainingCenterController::class, 'update'])->name('trainingCenter.update');
Route::delete('training-center/{trainingCenter}', [TrainingCenterController::class, 'destroy'])->name('trainingCenter.destroy');
