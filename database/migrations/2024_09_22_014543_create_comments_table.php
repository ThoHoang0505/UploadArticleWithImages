<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentsTable extends Migration
{
    public function up()
    {
        Schema::table('comments', function (Blueprint $table) {
            if (!Schema::hasColumn('comments', 'MaBT')) {
                $table->foreignId('MaBT')->constrained('baiviet')->onDelete('cascade')->nullable();
            }
    
            if (!Schema::hasColumn('comments', 'MaTK_DG')) {
                $table->foreignId('MaTK_DG')->constrained('taikhoan')->onDelete('cascade')->nullable();
            }
    
            // Thêm các cột khác nếu cần
        });
    }
    

    public function down()
    {
        Schema::dropIfExists('comments');
    }
}

