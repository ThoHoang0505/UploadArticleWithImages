<?php

namespace App\Http\Controllers;

use App\Models\TaiKhoan;
use App\Models\DocGia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // Hiển thị form đăng ký
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    // Xử lý đăng ký
    public function register(Request $request)
    {
        $request->validate([
            'TenDangNhap' => 'required|string|unique:taikhoan',
            'MatKhau' => 'required|string|confirmed',
            'TenDG' => 'required|string',
            'Email' => 'required|email|unique:docgia',
            'NgaySinh' => 'required|date',
            'SDT' => 'required|string',
            'DiaChi' => 'required|string',
            'GioiTinh' => 'required|string',
        ]);
    
        // Tạo tài khoản
        $taiKhoan = TaiKhoan::create([
            'TenDangNhap' => $request->TenDangNhap,
            'MatKhau' => bcrypt($request->MatKhau),
            'Quyen' => 6,
        ]);
    
        // Tạo độc giả
        DocGia::create([
            'TenDG' => $request->TenDG,
            'Email' => $request->Email,
            'NgaySinh' => $request->NgaySinh,
            'SDT' => $request->SDT,
            'DiaChi' => $request->DiaChi,
            'GioiTinh' => $request->GioiTinh,
            'MaTK_DG' => $taiKhoan->MaTK, // Sử dụng khóa của tài khoản vừa tạo
        ]);
    
        return redirect()->route('login')->with('success', 'Đăng ký thành công!');
    }
}
