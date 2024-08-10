<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PostController::class, 'index'])->name('posts.index');
Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show');

// Hiển thị danh sách học sinh
Route::get('/students', [StudentController::class, 'index'])->name('students.index');

// Thêm học sinh
Route::get('/students/create', [StudentController::class, 'create'])->name('students.create');
Route::post('/students', [StudentController::class, 'store'])->name('students.store');

// Sửa học sinh
Route::get('/students/{student_id}/edit', [StudentController::class, 'edit'])->name('students.edit');
Route::put('/students', [StudentController::class, 'update'])->name('students.update');

// Xoá học sinh
Route::get('/students/{student}/delete', [StudentController::class, 'delete'])->name('students.delete');
Route::delete('/students/{student}', [StudentController::class, 'destroy'])->name('students.destroy');
