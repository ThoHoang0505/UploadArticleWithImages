<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddLuotXemToBaivietTable extends Migration
{
    public function up()
    {
        Schema::table('baiviet', function (Blueprint $table) {
            $table->unsignedInteger('luot_xem')->default(0); // Thêm cột luot_xem
        });
    }
    
    public function down()
    {
        Schema::table('baiviet', function (Blueprint $table) {
            $table->dropColumn('luot_xem'); // Xóa cột luot_xem khi rollback
        });
    }
    
}
