<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BaiViet extends Model
{
    use HasFactory;

    protected $table = 'baiviet';
    protected $primaryKey = 'MaBT';
    public $timestamps = false;

    protected $fillable = [
        'TieuDeBT',
        'NoiDungBT',
        'AnhDaiDien',
        'NgayDang',
        'luot_xem',
        'LoaiBT',
    ];

    public function loaitin()
    {
        return $this->belongsTo(LoaiTin::class, 'MaLT');
    }
}
