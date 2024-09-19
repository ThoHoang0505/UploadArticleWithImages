<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BaiViet extends Model
{
    // Đặt tên bảng nếu khác với tên mặc định (số nhiều của tên model)
    protected $table = 'baiviet';

    // Khai báo các thuộc tính có thể được gán giá trị hàng loạt
    protected $fillable = [
        'TieuDeBT',
        'LoaiBT',
        'NoiDungBT',
        'AnhDaiDien',
    ];

    // Tắt tính năng timestamps
    public $timestamps = false;
}
