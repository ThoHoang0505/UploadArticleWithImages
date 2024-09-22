<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBaiVietLoaiTinTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('baiviet_loaitin', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('MaBT'); // Khóa ngoại từ bảng baiviet
            $table->unsignedBigInteger('MaLT'); // Khóa ngoại từ bảng loaitin
            $table->foreign('MaBT')->references('MaBT')->on('baiviet')->onDelete('cascade');
            $table->foreign('MaLT')->references('MaLT')->on('loaitin')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('baiviet_loaitin');
    }
}
