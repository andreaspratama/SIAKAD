<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSiswasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('siswas', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('nisn');
            $table->string('nama');
            $table->string('tpt_lahir');
            $table->date('tgl_lahir');
            $table->string('jns_kelamin');
            $table->string('agama');
            $table->string('alamat');
            $table->string('nama_ortu');
            $table->integer('kelas');
            $table->string('asal_sklh');
            $table->text('image')->nullable();
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
        Schema::dropIfExists('siswas');
    }
}
