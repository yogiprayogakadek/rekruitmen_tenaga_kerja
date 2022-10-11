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
        Schema::create('hasil_prainterview', function (Blueprint $table) {
            $table->id();
            $table->foreignId('jadwal_id')->references('id')->on('jadwal')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('user_id')->nullable()->comment('user yang melakukan update data')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->string('rekomendasi', 100);
            $table->string('grade', 50);
            $table->text('catatan');
            $table->enum('hasil', ['lulus', 'tidak lulus'])->nullable();
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
        Schema::dropIfExists('hasil_prainterview');
    }
};
