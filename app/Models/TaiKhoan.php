<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Authenticatable as AuthenticatableTrait;

class TaiKhoan extends Model implements Authenticatable
{
    use AuthenticatableTrait; // Thêm trait này

    protected $table = 'taikhoan';
    protected $primaryKey = 'MaTK';
    protected $fillable = ['TenDangNhap', 'MatKhau', 'Quyen'];

    public $timestamps = false; // Nếu bạn không có timestamps
}
