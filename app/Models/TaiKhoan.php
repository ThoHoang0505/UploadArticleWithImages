<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TaiKhoan extends Model
{
    protected $table = 'taikhoan';
    protected $primaryKey = 'MaTK';

    protected $fillable = [
        'TenDangNhap',
        'MatKhau',
        'Quyen',
    ];

    public $timestamps = false; // Tắt timestamps nếu không dùng
}

