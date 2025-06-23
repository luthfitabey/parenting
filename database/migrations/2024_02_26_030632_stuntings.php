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
        Schema::create('stuntings', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('balita_id');
            $table->boolean('isStunting')->default(false);
            $table->string('bulan_timbang');
            $table->timestamps();

            // Foreign Key ke tabel balitas
            $table->foreign('balita_id')->references('id')->on('balitas')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stuntings');
    }
};
