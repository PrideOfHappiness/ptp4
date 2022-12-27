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
        Schema::create('pengambilan_matakuliah', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_matakuliah')->unsigned();
            $table->bigInteger('id_semester')->unsigned();
            $table->bigInteger('user_id_mahasiswa')->unsigned();
            $table->timestamps();

            $table->foreign('user_id_mahasiswa')->references('id')->on('users');
            $table->foreign('id_semester')->references('id')->on('semester');
            $table->foreign('id_matakuliah')->references('id')->on('matakuliah');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pengambilan_matakuliah');
    }
};
