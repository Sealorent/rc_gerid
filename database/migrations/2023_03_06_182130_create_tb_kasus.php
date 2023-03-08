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
        Schema::create('tb_kasus', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal', 10);
            $table->integer('no_kasus');
            $table->string('nama', 10);
            $table->string('alamat');
            $table->decimal('lat', 10, 8);
            $table->decimal('long', 11, 8);
            $table->integer('id_provinsi');
            $table->integer('id_kabupaten');
            $table->integer('id_kecamatan');
            $table->integer('umur');
            $table->enum('jenis_kelamin', ['1', '2'])->comment("1 : male | 2 : female");
            $table->foreignId('kelompok_umur')->references('id')->on('tm_kelompok_umur');
            $table->foreignId('transmisi')->references('id')->on('tm_transmisi');
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
        Schema::table('tb_kasus', function (Blueprint $table) {
            //
        });
    }
};
