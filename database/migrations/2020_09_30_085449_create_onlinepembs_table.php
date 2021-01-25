<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOnlinepembsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('onlinepembs', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('nisn');
            $table->string('nama');
            $table->integer('jenispem_id');
            $table->date('tanggal');
            $table->integer('kelas');
            $table->text('image');
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
        Schema::dropIfExists('onlinepembs');
    }
}
