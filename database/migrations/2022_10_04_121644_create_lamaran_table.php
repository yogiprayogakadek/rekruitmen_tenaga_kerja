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
        Schema::create('lamaran', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->comment('user yang melakukan update data')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('pelamar_id')->references('id')->on('pelamar')->onDelete('cascade')->onUpdate('cascade');
            $table->string('apply_for', 100);
            $table->string('posisi', 100);
            $table->json('documents');
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
        Schema::dropIfExists('lamaran');
    }
};
