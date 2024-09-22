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
        Schema::create('baiviet_loaitin', function (Blueprint $table) {
            $table->id();
            $table->foreignId('MaBT')->constrained('baiviet')->onDelete('cascade');
            $table->foreignId('MaLT')->constrained('loaitin')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('baiviet_loaitin');
    }
};
