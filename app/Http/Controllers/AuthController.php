<?php

namespace App\Http\Controllers;

use App\Models\TaiKhoan;
use App\Models\DocGia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showRegistrationForm()
    {
        return view('auth.register');
    }
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
    
        $taiKhoan = TaiKhoan::create([
            'TenDangNhap' => $request->TenDangNhap,
            'MatKhau' => bcrypt($request->MatKhau),
            'Quyen' => 6,
        ]);
    
        DocGia::create([
            'TenDG' => $request->TenDG,
            'Email' => $request->Email,
            'NgaySinh' => $request->NgaySinh,
            'SDT' => $request->SDT,
            'DiaChi' => $request->DiaChi,
            'GioiTinh' => $request->GioiTinh,
            'MaTK_DG' => $taiKhoan->MaTK, //Khóa ngoại MaTK_DG với MaTK
        ]);
    
        return redirect()->route('login')->with('success', 'Đăng ký thành công!');
    }
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'TenDangNhap' => 'required|string',
            'MatKhau' => 'required|string',
        ]);
    
        $credentials = $request->only('TenDangNhap', 'MatKhau');

        $taiKhoan = TaiKhoan::where('TenDangNhap', $credentials['TenDangNhap'])->first();
    
        if ($taiKhoan && Hash::check($credentials['MatKhau'], $taiKhoan->MatKhau)) {
            Auth::login($taiKhoan);
            return redirect()->route('baiviet.index');
        } else {
            return redirect()->back()->withErrors(['login_error' => 'Sai tên đăng nhập hoặc mật khẩu.']);
        }
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('dangnhap')->with('success', 'Đăng xuất thành công!');
    }
}
