<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('balitas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama');
            $table->date('tgl_lahir');
            $table->integer('tinggi_badan');
            $table->integer('massa_badan');
            $table->string('alamat_lengkap');
            $table->unsignedInteger('kelurahan_id');
            
            // Relasi dengan tabel kelurahans
            $table->foreign('kelurahan_id')
                ->references('id')
                ->on('kelurahans')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('balitas');
    }
};
