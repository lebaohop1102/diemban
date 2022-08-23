<?php namespace ThaiMinh\DiemBan\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

/**
 * CreateDiemBansTable Migration
 */
class CreateDiemBansTable extends Migration
{
    public function up()
    {
        Schema::create('thaiminh_diemban_diem_bans', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('thaiminh_diemban_diem_bans');
    }
}
