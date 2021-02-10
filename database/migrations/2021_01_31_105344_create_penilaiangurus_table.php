<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenilaiangurusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penilaiangurus', function (Blueprint $table) {
            $table->id();
            $table->integer('guru_id');
            $table->integer('thnakademik_id');
            $table->integer('pert1');
            $table->integer('pert2');
            $table->integer('pert3');
            $table->integer('pert4');
            $table->integer('pert5');
            $table->integer('pert6');
            $table->integer('pert7');
            $table->integer('pert8');
            $table->integer('pert9');
            $table->integer('pert10');
            $table->integer('pert11');
            $table->integer('pert12');
            $table->integer('pert13');
            $table->integer('pert14');
            $table->integer('pert15');
            $table->integer('pert16');
            $table->integer('pert17');
            $table->integer('pert18');
            $table->integer('pert19');
            $table->integer('pert20');
            $table->integer('total');
            $table->float('hasil_total');
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
        Schema::dropIfExists('penilaiangurus');
    }
}
