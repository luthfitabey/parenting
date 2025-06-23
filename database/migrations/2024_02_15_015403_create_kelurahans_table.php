<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Jalankan migrasi.
     */
    public function up()
    {
        Schema::create('kelurahans', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('kode')->unique();
            $table->string('nama', 40);
            $table->unsignedInteger('kecamatan_id'); // Pastikan unsigned

            // Foreign Key Constraint dengan ON DELETE dan ON UPDATE Cascade
            $table->foreign('kecamatan_id')
                ->references('id')
                ->on('kecamatans')
                ->onUpdate('cascade') // Jika id di kecamatans berubah, ikut diperbarui
                ->onDelete('cascade'); // Jika kecamatans dihapus, kelurahans terkait ikut terhapus
            
            $table->timestamps();
        });
    }

    /**
     * Rollback migrasi.
     */
    public function down()
    {
        Schema::dropIfExists('kelurahans');
    }
};
