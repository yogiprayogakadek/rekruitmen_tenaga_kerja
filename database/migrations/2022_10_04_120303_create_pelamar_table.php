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
        Schema::create('pelamar', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->comment('user yang melakukan update data')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->string('nama', 100);
            $table->string('email', 100)->unique();
            $table->char('telepon', 16);
            $table->string('tempat_lahir', 100);
            $table->date('tanggal_lahir');
            $table->boolean('jenis_kelamin');
            $table->string('agama', 20);
            $table->string('alamat', 100);
            $table->integer('berat_badan');
            $table->integer('tinggi_badan');
            $table->string('marital_status', 50);
            $table->string('username', 100);
            $table->string('password', 100);
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
        Schema::dropIfExists('pelamar');
    }
};
