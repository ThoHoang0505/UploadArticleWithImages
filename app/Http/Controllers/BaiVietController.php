<?php

namespace App\Http\Controllers;

use App\Models\BaiViet;
use App\Models\LoaiTin;
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
            'loaiTin' => 'required|array|max:100',
            'NoiDungBT' => 'required',
            'AnhDaiDien' => 'required|image|max:2048',
        ]);

        $pathImage = null;
        if ($request->hasFile('AnhDaiDien')) {
            $pathImage = $request->file('AnhDaiDien')->store('images', 'public');
        }
        //MaLT -> TenLT
        $loaiTinNames = [];
        foreach ($request->loaiTin as $maLT) {
            $loaiTin = LoaiTin::find($maLT);
            if ($loaiTin) {
                $loaiTinNames[] = $loaiTin->TenLT;
            }
        }
        $loaiTinStr = implode(',', $loaiTinNames);
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
    public function index()
    {
        $baiviets = BaiViet::orderBy('NgayDang', 'desc')->get();
        return view('baiviet.index', compact('baiviets'));
    }
    public function show($maBT)
    {
        $baiviet = BaiViet::findOrFail($maBT);
        $baiviet->luot_xem++;
        $baiviet->save();
        $comments = Comment::where('MaBT', $maBT)->with('user')->get();
        $loaitin = $baiviet->loaitin;
        return view('baiviet.show', compact('baiviet', 'comments', 'loaitin'));
    }
}