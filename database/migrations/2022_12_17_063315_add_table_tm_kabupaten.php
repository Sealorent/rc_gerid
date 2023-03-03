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
        Schema::create('tm_kabupaten', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_provinsi')->references('id')->on('tm_provinsi');
            $table->string('nama_kabupaten');
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
        Schema::table('tm_kabupaten', function (Blueprint $table) {
            //
        });
    }
};
