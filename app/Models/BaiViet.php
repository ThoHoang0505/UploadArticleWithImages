<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BaiViet extends Model
{
    protected $table = 'baiviet';
    protected $primaryKey = 'MaBT';

    protected $fillable = [
        'TieuDeBT',
        'LoaiBT',
        'NoiDungBT',
        'AnhDaiDien',
        'NgayDang',
        'luot_xem', // Nếu có cột này trong database
    ];

    public $timestamps = false; // Đảm bảo dòng này tồn tại
}

