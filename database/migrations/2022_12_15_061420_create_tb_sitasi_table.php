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
        Schema::create('tb_sitasi', function (Blueprint $table) {
            $table->id();
            $table->string('judul_artikel');
            $table->foreignId('id_pengarang')->references('id')->on('tm_pengarang');
            $table->foreignId('id_sampel')->references('id')->on('tb_sampel');
            $table->foreignId('id_user')->references('id')->on('users');
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
        Schema::dropIfExists('tb_sitasi');
    }
};
