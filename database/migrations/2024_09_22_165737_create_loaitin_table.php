<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLoaiTinTable extends Migration
{
    public function up()
    {
        Schema::create('loaitin', function (Blueprint $table) {
            $table->id('MaLT');
            $table->string('TenLoai', 255);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('loaitin');
    }
}
