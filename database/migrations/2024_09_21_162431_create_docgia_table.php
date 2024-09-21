<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('docgia', function (Blueprint $table) {
            $table->id('MaDG');
            $table->string('TenDG');
            $table->string('Email');
            $table->date('NgaySinh'); // Bắt buộc không được bỏ trống
            $table->string('SDT');
            $table->string('DiaChi');
            $table->enum('GioiTinh', ['Nam', 'Nữ']);
            $table->unsignedBigInteger('MaTK_DG')->nullable();
            $table->foreign('MaTK_DG')->references('MaTK')->on('taikhoan')->onDelete('cascade');
        });
    }    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('docgia');
    }
};
