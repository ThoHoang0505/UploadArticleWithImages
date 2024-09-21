<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BaiViet extends Model
{
    use HasFactory;

    protected $table = 'baiviet'; // Tên bảng
    protected $primaryKey = 'MaBT'; // Đặt khóa chính là 'MaBT'
    public $timestamps = false; // Nếu không có cột timestamps

    // Các cột có thể được gán giá trị một cách mass-assignment
    protected $fillable = [
        'TieuDeBT',
        'LoaiBT',
        'NoiDungBT',
        'AnhDaiDien',
        'NgayDang',
        'luot_xem',
    ];
}
