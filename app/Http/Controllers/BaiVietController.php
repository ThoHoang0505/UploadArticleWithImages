<?php

namespace App\Http\Controllers;

use App\Models\BaiViet;
use Illuminate\Http\Request;
use App\Models\Comment;

class BaiVietController extends Controller
{
    public function create()
    {
        return view('baiviet.create'); // Trả về view tạo bài viết
    }
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
        // Lấy tất cả bài viết từ bảng 'baiviet' theo thứ tự ngày đăng
        $baiviets = BaiViet::orderBy('NgayDang', 'desc')->get();
        return view('baiviet.index', compact('baiviets'));
    }

    // Hiển thị chi tiết bài viết
    public function show($maBT)
    {
        $baiviet = BaiViet::findOrFail($maBT);
    
        // Tăng lượt xem
        $baiviet->luot_xem++;
        $baiviet->save();
    
        // Lấy các bình luận liên quan
        $comments = Comment::where('MaBT', $maBT)->with('user')->get();
    
        return view('baiviet.show', compact('baiviet', 'comments'));
    }
}
