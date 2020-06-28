<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJadwalmapelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jadwalmapels', function (Blueprint $table) {
            $table->id();
            $table->integer('guru_id');
            $table->integer('mapel_id');
            $table->string('ruang_id');
            $table->integer('kelas');
            $table->string('hari');
            $table->time('jam_mulai');
            $table->time('jam_selesai');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jadwalmapels');
    }
}
