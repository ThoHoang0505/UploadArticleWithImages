<?php

namespace App\Http\Controllers;

use App\Models\BaiViet;
use Illuminate\Http\Request;

class BaiVietController extends Controller
{
    // Hiển thị form tạo bài viết
    public function create()
    {
        return view('baiviet.create');
    }

    // Lưu bài viết mới vào cơ sở dữ liệu
    public function store(Request $request)
    {
        try {
            $request->validate([
                'TieuDeBT' => 'required|max:255',
                'LoaiBT' => 'required|max:100',
                'NoiDungBT' => 'required',
                'AnhDaiDien' => 'required|image|max:2048', // Đảm bảo chỉ upload 1 ảnh đại diện
            ]);

            $pathImage = null;
            if ($request->hasFile('AnhDaiDien')) {
                $pathImage = $request->file('AnhDaiDien')->store('images', 'public');
            }

            BaiViet::create([
                'TieuDeBT' => $request->TieuDeBT,
                'LoaiBT' => $request->LoaiBT,
                'NoiDungBT' => $request->NoiDungBT,
                'AnhDaiDien' => $pathImage,
                'NgayDang' => now(),
            ]);

            return redirect()->route('baiviet.create')->with('success', 'Bài viết đã được tạo thành công!');
        } catch (\Exception $e) {
            return redirect()->route('baiviet.create')->with('error', 'Có lỗi xảy ra khi lưu bài viết: ' . $e->getMessage());
        }
    }

    // Hiển thị danh sách bài viết
    public function index()
    {
        $baiviets = BaiViet::all();
        return view('baiviet.index', compact('baiviets'));
    }
    public function show($MaBT)
    {
        $baiviet = BaiViet::findOrFail($MaBT);
        return view('baiviet.show', compact('baiviet'));
    }
}
