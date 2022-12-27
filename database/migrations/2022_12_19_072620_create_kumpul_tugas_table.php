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
        Schema::create('kumpul_jawaban', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('tugas_id')->unsigned();
            $table->bigInteger('mahasiswa_kumpul')->unsigned();
            $table->string('namaFile')->nullable();
            $table->integer('nilai')->nullable();
            $table->timestamps();

            $table->foreign('tugas_id')->references('id')->on('tugas');
            $table->foreign('mahasiswa_kumpul')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kumpul_jawaban');
    }
};
