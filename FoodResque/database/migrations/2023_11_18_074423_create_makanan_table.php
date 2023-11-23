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
            $table->text('foto');
            $table->string('nama_menu');
            $table->integer('jumlah_makanan');
            $table->date('tanggal_expired');
            $table->time('waktu');
            $table->enum('status',['ready', 'occupied', 'finished'])->default('ready');
            $table->unsignedBigInteger('donatur_id');
            $table->foreign('donatur_id')->references('id')->on('donatur');
            $table->unsignedInteger('mitra_id')->nullable();
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
