<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_sampel', function (Blueprint $table) {
            $table->id();
            $table->string('kode_sampel');
            $table->foreignId('id_virus')->references('id')->on('tm_virus');
            $table->string('genotipe');
            $table->string('nama_gen');
            $table->string('data_sekuen');
            $table->string('tempat');
            $table->integer('id_kota');
            $table->integer('id_provinsi');
            $table->date('tanggal_pengambilan');
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
        Schema::dropIfExists('tb_sampel');
    }
};
