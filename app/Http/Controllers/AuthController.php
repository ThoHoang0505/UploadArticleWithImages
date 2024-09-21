<?php

namespace App\Http\Controllers;

use App\Models\TaiKhoan;
use App\Models\DocGia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

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
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Xử lý việc đăng nhập
    public function login(Request $request)
    {
        // Validate thông tin đăng nhập
        $request->validate([
            'TenDangNhap' => 'required|string',
            'MatKhau' => 'required|string',
        ]);
    
        // Kiểm tra đăng nhập
        $credentials = $request->only('TenDangNhap', 'MatKhau');
    
        // Lấy thông tin tài khoản từ cơ sở dữ liệu
        $taiKhoan = TaiKhoan::where('TenDangNhap', $credentials['TenDangNhap'])->first();
    
        if ($taiKhoan && Hash::check($credentials['MatKhau'], $taiKhoan->MatKhau)) {
            // Nếu thông tin hợp lệ, thực hiện đăng nhập
            Auth::login($taiKhoan);
            return redirect()->route('baiviet.index');
        } else {
            // Đăng nhập thất bại, trả về lỗi
            return redirect()->back()->withErrors(['login_error' => 'Sai tên đăng nhập hoặc mật khẩu.']);
        }
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('dangnhap')->with('success', 'Đăng xuất thành công!');
    }
}
