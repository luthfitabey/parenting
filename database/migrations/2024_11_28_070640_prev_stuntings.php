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
        Schema::create('prev_stuntings', function (Blueprint $table) {
            $table->increments('id');
            $table->double('prevalensi_eppgbm');
            $table->double('prevalensi_ski');
            $table->unsignedInteger('stunting_id');

            $table->foreign('stunting_id')
                ->references('id')
                ->on('stuntings')
                ->onUpdate('cascade') 
                ->onDelete('cascade'); // Jika balita dihapus, data prev_stuntings ikut terhapus

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('prev_stuntings');
    }
};
