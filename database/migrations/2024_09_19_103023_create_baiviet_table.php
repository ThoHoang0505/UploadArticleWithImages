<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBaiVietTable extends Migration
{
    public function up()
    {
        Schema::create('baiviet', function (Blueprint $table) {
            $table->id('MaBT');
            $table->string('TieuDeBT', 255);
            $table->longText('NoiDungBT');
            $table->string('AnhDaiDien', 255);
            $table->timestamp('NgayDang')->useCurrent();
            $table->integer('luot_xem')->default(0);
            $table->foreignId('MaLT')->constrained('loaitin')->onDelete('cascade');
        });
    }
    public function down()
    {
        Schema::dropIfExists('baiviet');
    }
}
