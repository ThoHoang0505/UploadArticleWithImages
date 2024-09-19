<?php

namespace App\Http\Controllers;

use App\Models\BaiViet;
use Illuminate\Http\Request;

class BaiVietController extends Controller
{
    public function create()
    {
        return view('baiviet.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'TieuDeBT' => 'required|string|max:255',
            'LoaiBT' => 'required|string|max:255',
            'NoiDungBT' => 'required',
            'AnhDaiDien' => 'required|image',
        ]);

        $imageName = time().'.'.$request->AnhDaiDien->extension();
        $request->AnhDaiDien->move(public_path('storage/images'), $imageName);

        BaiViet::create([
            'TieuDeBT' => $request->TieuDeBT,
            'LoaiBT' => $request->LoaiBT,
            'NoiDungBT' => $request->NoiDungBT,
            'AnhDaiDien' => $imageName,
        ]);

        return redirect()->route('baiviet.create')->with('success', 'Bài viết đã được đăng tải!');
    }
}
