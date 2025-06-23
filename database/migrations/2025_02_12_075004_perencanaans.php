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
        Schema::create('perencanaans', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('tahun'); // Memperbaiki tipe data
            $table->double('anggaran');
            $table->string('opd');
            $table->unsignedInteger('nomenklatur_id');
            $table->unsignedInteger('intervensi_id');
            $table->unsignedInteger('balitas_id');

            // Foreign keys
            $table->foreign('nomenklatur_id')
                ->references('id')
                ->on('nomenklaturs')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->foreign('intervensi_id')
                ->references('id')
                ->on('intervensis')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->foreign('balitas_id')
                ->references('id')
                ->on('balitas')
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
        Schema::dropIfExists('perencanaans');
    }
};
