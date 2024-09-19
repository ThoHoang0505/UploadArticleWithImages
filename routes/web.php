<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BaiVietController;
use App\Http\Controllers\HomeController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/baiviet/index', [BaiVietController::class, 'index'])->name('baiviet.index');
Route::get('/baiviet/create', [BaiVietController::class, 'create'])->name('baiviet.create');
Route::post('/baiviet/store', [BaiVietController::class, 'store'])->name('baiviet.store');
Route::get('/baiviet/{MaBT}', [BaiVietController::class, 'show'])->name('baiviet.show');
// Route upload CKEditor
Route::post('/upload', [HomeController::class, 'upload'])->name('ckeditor.upload');
