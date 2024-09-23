<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BaiVietController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController;
use Illuminate\Support\Facades\Auth;
// Route mặc định
Route::get('/', function () {
    return view('welcome');
});
// Đăng bài và hiển thị
Route::get('/baiviet/index', [BaiVietController::class, 'index'])->name('baiviet.index');
Route::get('/baiviet/create', [BaiVietController::class, 'create'])->name('baiviet.create');
Route::post('/baiviet/store', [BaiVietController::class, 'store'])->name('baiviet.store');
// Route bài viết với tham số động
Route::get('/baiviet/{MaBT}', [BaiVietController::class, 'show'])->name('baiviet.show');
// Đăng nhập - Đăng xuất
Route::get('/dangky', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('/dangky', [AuthController::class, 'register'])->name('register');
Route::get('/dangnhap', [AuthController::class, 'showLoginForm'])->name('dangnhap');
Route::post('/dangnhap', [AuthController::class, 'login'])->name('login');
Route::post('/dangxuat', function () {
    Auth::logout();
    return redirect()->route('baiviet.index'); // Chuyển hướng về trang index sau khi đăng xuất
})->name('dangxuat');
// Bình luận bài viết
Route::post('/baiviet/{MaBT}/comment', [CommentController::class, 'store'])->name('comments.store');
// Chỉnh sửa bài viết
Route::get('/manage', [BaiVietController::class, 'manage'])->name('baiviet.manage');
Route::get('/baiviet/{MaBT}/edit', [BaiVietController::class, 'edit'])->name('baiviet.edit');
Route::put('/baiviet/{MaBT}', [BaiVietController::class, 'update'])->name('baiviet.update');
Route::delete('/baiviet/{MaBT}', [BaiVietController::class, 'destroy'])->name('baiviet.destroy');
// Route upload CKEditor
Route::post('/upload', [HomeController::class, 'upload'])->name('ckeditor.upload');
Route::get('/test', function () {
    return 'Route test successful!';
});
