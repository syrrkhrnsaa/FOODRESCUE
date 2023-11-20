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
        Schema::create('makanan', function (Blueprint $table) {
            $table->id();
            $table->string('nama_Menu');
            $table->integer('jumlah_Makanan');
            $table->date('tanggal_Expired');
            $table->time('waktu');
            $table->string('status');
            $table->unsignedBigInteger('donatur_id');
            $table->foreign('donatur_id')->references('id')->on('donatur');
            $table->unsignedInteger('mitra_id');
            $table->foreign('mitra_id')->references('id')->on('mitra');
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
        Schema::dropIfExists('makanan');
    }
};
