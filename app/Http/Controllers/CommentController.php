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
        $comment->MaTK_DG = Auth::id(); // Lấy ID của người dùng đã đăng nhập
        $comment->NoiDung = $request->NoiDung;
        $comment->save();
    
        return redirect()->route('baiviet.show', $maBT)->with('success', 'Bình luận đã được thêm thành công!');
    }
    
}
