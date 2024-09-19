<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BaiVietController;
use App\Http\Controllers\ImageUploadController;
use App\Http\Controllers\HomeController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/baiviet/create', [BaiVietController::class, 'create'])->name('baiviet.create');
Route::post('/baiviet/store', [BaiVietController::class, 'store'])->name('baiviet.store');
Route::post('/upload',[HomeController::class,'upload'])->name('ckeditor.upload');


