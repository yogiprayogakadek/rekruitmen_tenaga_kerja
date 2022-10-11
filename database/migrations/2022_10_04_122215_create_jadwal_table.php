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
        Schema::create('jadwal', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->comment('user yang melakukan update data')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('lamaran_id')->references('id')->on('lamaran')->onDelete('cascade')->onUpdate('cascade');
            $table->date('tanggal_prainterview');
            $table->date('tanggal_finalinterview')->nullable();
            $table->boolean('status')->default(true);
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
        Schema::dropIfExists('jadwal');
    }
};
