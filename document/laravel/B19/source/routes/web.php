<?php

use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/students', [StudentController::class, 'index'])->name('students.index');
Route::get('/students/export', [StudentController::class, 'export'])->name('students.export');
Route::post('/students/import', [StudentController::class, 'import'])->name('students.import');
