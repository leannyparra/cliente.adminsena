<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AreaController;
use App\Http\Controllers\ComputerController;
use App\Http\Controllers\TrainingCenterController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\ApprenticeController;
Route::get('/', function () {
    return view('welcome');
});

//area
Route::get('area', [AreaController::class, 'index'])->name('area.index');
Route::get('area/create',[AreaController::class,'create'])->name('area.create');

Route::get('area/{area}', [AreaController::class, 'show'])->name('area.show');
Route::post('area', [AreaController::class, 'store'])->name('area.store');
Route::get('area/{area}/editar',[AreaController::class,'edit'])->name('area.edit');
Route::put('area/{area}', [AreaController::class, 'update'])->name('area.update');
Route::delete('area/{area}', [AreaController::class, 'destroy'])->name('area.destroy');

//computer
Route::get('computer', [ComputerController::class, 'index'])->name('computer.index');
Route::get('computer/create', [ComputerController::class, 'create'])->name('computer.create');

Route::get('computer/{computer}', [ComputerController::class, 'show'])->name('computer.show');
Route::post('computer', [ComputerController::class, 'store'])->name('computer.store');
Route::get('computer/{computer}/editar', [ComputerController::class, 'edit'])->name('computer.edit');
Route::put('computer/{computer}', [ComputerController::class, 'update'])->name('computer.update');
Route::delete('computer/{computer}', [ComputerController::class, 'destroy'])->name('computer.destroy');

//training center
Route::get('training-center', [TrainingCenterController::class, 'index'])->name('trainingCenter.index');
Route::get('training-center/create', [TrainingCenterController::class, 'create'])->name('trainingCenter.create');

Route::get('training-center/{trainingCenter}', [TrainingCenterController::class, 'show'])->name('trainingCenter.show');
Route::post('training-center', [TrainingCenterController::class, 'store'])->name('trainingCenter.store');
Route::get('training-center/{trainingCenter}/editar', [TrainingCenterController::class, 'edit'])->name('trainingCenter.edit');
Route::put('training-center/{trainingCenter}', [TrainingCenterController::class, 'update'])->name('trainingCenter.update');
Route::delete('training-center/{trainingCenter}', [TrainingCenterController::class, 'destroy'])->name('trainingCenter.destroy');

//teacher
Route ::get('teacher', [TeacherController::class, 'index'])->name('teacher.index');
Route::get('teacher/create', [TeacherController::class, 'create'])->name('teacher.create');

Route::get('teacher/{teacher}', [TeacherController::class, 'show'])->name('teacher.show');
Route::post('teacher', [TeacherController::class, 'store'])->name('teacher.store');
Route::get('teacher/{teacher}/editar', [TeacherController::class, 'edit'])->name('teacher.edit');
Route::put('teacher/{teacher}', [TeacherController::class, 'update'])->name('teacher.update');
Route::delete('teacher/{teacher}', [TeacherController::class, 'destroy'])->name('teacher.destroy');

//course
Route::get('course', [CourseController::class, 'index'])->name('course.index');
Route::get('course/create', [CourseController::class, 'create'])->name('course.create');

Route::get('course/{course}', [CourseController::class, 'show'])->name('course.show');
Route::post('course', [CourseController::class, 'store'])->name('course.store');
Route::get('course/{course}/editar', [CourseController::class, 'edit'])->name('course.edit');
Route::put('course/{course}', [CourseController::class, 'update'])->name('course.update');
Route::delete('course/{course}', [CourseController::class, 'destroy'])->name('course.destroy');

//apprentice
//apprentice
Route::get('apprentice', [ApprenticeController::class, 'index'])->name('apprentice.index');
Route::get('apprentice/create', [ApprenticeController::class, 'create'])->name('apprentice.create');

Route::get('apprentice/{apprentice}', [ApprenticeController::class, 'show'])->name('apprentice.show');
Route::post('apprentice', [ApprenticeController::class, 'store'])->name('apprentice.store');
Route::get('apprentice/{apprentice}/editar', [ApprenticeController::class, 'edit'])->name('apprentice.edit');
Route::put('apprentice/{apprentice}', [ApprenticeController::class, 'update'])->name('apprentice.update');
Route::delete('apprentice/{apprentice}', [ApprenticeController::class, 'destroy'])->name('apprentice.destroy');