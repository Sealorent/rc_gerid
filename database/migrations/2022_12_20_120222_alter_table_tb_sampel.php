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
        Schema::table('tb_sampel', function (Blueprint $table) {
            $table->dropColumn('genotipe');
            $table->foreignId('id_pengarang')->references('id')->on('tm_pengarang');
            $table->foreignId('id_genotipe')->references('id')->on('tm_genotipe')->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::table('tb_sampel', function (Blueprint $table) {
        //     $table->string('genotipe')->change();
        // });
    }
};
