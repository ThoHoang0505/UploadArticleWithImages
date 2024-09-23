<?php
namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Request $request, $maBT)
    {
        $request->validate([
            'NoiDung' => 'required|string|max:255',
        ]);
    
        $comment = new Comment();
        $comment->MaBT = $maBT;
        $comment->MaTK_DG = Auth::id();
        $comment->NoiDung = $request->NoiDung;
        $comment->save();
        // Trả về thông tin bình luận dưới dạng JSON
        return response()->json([
            'comment' => $comment->NoiDung,
            'created_at' => $comment->created_at->format('H:i d/m/Y'),
            'username' => $comment->user ? $comment->user->TenDangNhap : 'Người dùng ẩn danh',
        ]);
    }
}
