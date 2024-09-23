<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Authenticatable as AuthenticatableTrait;

class TaiKhoan extends Model implements Authenticatable
{
    use AuthenticatableTrait;

    protected $table = 'taikhoan';
    protected $primaryKey = 'MaTK';
    protected $fillable = ['TenDangNhap', 'MatKhau', 'Quyen'];

    public $timestamps = false;
}
