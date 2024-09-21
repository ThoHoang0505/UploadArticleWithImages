<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = ['MaBT', 'MaTK_DG', 'NoiDung'];

    public function baiviet()
    {
        return $this->belongsTo(BaiViet::class, 'MaBT');
    }

    public function taikhoan()
    {
        return $this->belongsTo(TaiKhoan::class, 'MaTK_DG');
    }
    public function user()
    {
        return $this->belongsTo(TaiKhoan::class, 'MaTK_DG', 'MaTK');
    }
}
