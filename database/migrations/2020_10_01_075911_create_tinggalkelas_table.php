<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTinggalkelasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tinggalkelas', function (Blueprint $table) {
            $table->id();
            $table->integer('thnakademik_id');
            $table->bigInteger('nisn');
            $table->string('nama');
            $table->integer('asal_kls');
            $table->integer('tgl_kls');
            $table->text('alasan');
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
        Schema::dropIfExists('tinggalkelas');
    }
}
