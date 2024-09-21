<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DocGia extends Model
{
    protected $table = 'docgia';
    protected $primaryKey = 'MaDG';

    protected $fillable = [
        'TenDG',
        'Email',
        'NgaySinh', // Thêm trường Ngày Sinh
        'SDT',      // Thêm trường Số Điện Thoại
        'DiaChi',   // Thêm trường Địa Chỉ
        'GioiTinh', // Thêm trường Giới Tính
        'MaTK_DG',  // Khóa ngoại liên kết với bảng taikhoan
    ];

    public $timestamps = false; // Tắt timestamps nếu không dùng
}
