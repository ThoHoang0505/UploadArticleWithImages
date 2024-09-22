<?php

namespace App\Http\Controllers;

use App\Models\BaiViet;
use App\Models\LoaiTin; // Thêm model LoaiTin
use Illuminate\Http\Request;
use App\Models\Comment;

class BaiVietController extends Controller
{
    public function create()
    {
        $loaitin = LoaiTin::all();
        return view('baiviet.create', compact('loaitin'));
    }

    public function store(Request $request)
{
    try {
        $request->validate([
            'TieuDeBT' => 'required|max:255',
            'loaiTin' => 'required|array|max:100', // Vẫn giữ mảng để kiểm tra
            'NoiDungBT' => 'required',
            'AnhDaiDien' => 'required|image|max:2048',
        ]);

        $pathImage = null;
        if ($request->hasFile('AnhDaiDien')) {
            $pathImage = $request->file('AnhDaiDien')->store('images', 'public');
        }

        // Lấy tên loại tin từ mã loại tin
        $loaiTinNames = [];
        foreach ($request->loaiTin as $maLT) {
            // Giả sử bạn đã có danh sách loại tin ở đây
            $loaiTin = LoaiTin::find($maLT); // Lấy loại tin từ database theo mã
            if ($loaiTin) {
                $loaiTinNames[] = $loaiTin->TenLT; // Thêm tên loại tin vào mảng
            }
        }

        $loaiTinStr = implode(',', $loaiTinNames); // Chuyển mảng thành chuỗi

        BaiViet::create([
            'TieuDeBT' => $request->TieuDeBT,
            'LoaiBT' => $loaiTinStr, // Lưu tên loại tin
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

        // Lấy loại tin liên quan
        $loaitin = $baiviet->loaitin;
    
        return view('baiviet.show', compact('baiviet', 'comments', 'loaitin'));
    }
}
