<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoaiTin extends Model
{
    use HasFactory;

    protected $table = 'loaitin';
    protected $primaryKey = 'MaLT';
    protected $fillable = ['TenLoai'];

    public function baiviets()
    {
        return $this->hasMany(BaiViet::class, 'MaLT');
    }
}
