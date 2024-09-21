<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BaiVietController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('welcome');
});
//Dang bai va hien thi
Route::get('/baiviet/index', [BaiVietController::class, 'index'])->name('baiviet.index');
Route::get('/baiviet/create', [BaiVietController::class, 'create'])->name('baiviet.create');
Route::post('/baiviet/store', [BaiVietController::class, 'store'])->name('baiviet.store');
Route::get('/baiviet/{MaBT}', [BaiVietController::class, 'show'])->name('baiviet.show');
//Dang nhap - Dang Xuat
Route::get('/dangky', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('/dangky', [AuthController::class, 'register'])->name('register');
Route::get('/dangnhap', [AuthController::class, 'showLoginForm'])->name('dangnhap');
Route::post('/dangnhap', [AuthController::class, 'login'])->name('login');
Route::post('/dangxuat', [AuthController::class, 'logout'])->name('logout');
// Route upload CKEditor
Route::post('/upload', [HomeController::class, 'upload'])->name('ckeditor.upload');
