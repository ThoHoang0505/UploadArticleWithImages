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
    ];

    // Tắt tính năng timestamps vì bạn đã có cột NgayDang
    public $timestamps = false;
}
