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
        Schema::create('matakuliah', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned();
            $table->string('nama');
            $table->bigInteger('nama_dosen')->unsigned();
            $table->string('tempat_kelas');
            $table->date('tanggal');
            $table->string('hari_pelaksanaan');
            $table->string('jam_mulai');
            $table->string('jam_selesai');
            $table->timestamps();

            $table->foreign('nama_dosen')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('matakuliah');
    }
};
