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
        Schema::table('jadwal', function (Blueprint $table) {
            $table->text('keterangan')->after('lamaran_id');
            $table->string('lokasi_prainterview', 100)->after('keterangan');
            $table->time('jam_prainterview', 0)->after('lokasi_prainterview');
            $table->string('lokasi_finalinterview', 100)->after('jam_prainterview')->nullable();
            $table->time('jam_finalinterview', 0)->after('lokasi_finalinterview')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('jadwal', function (Blueprint $table) {
            $table->dropColumn('keterangan');
            $table->dropColumn('lokasi_prainterview');
            $table->dropColumn('jam_prainterview');
            $table->dropColumn('lokasi_finalinterview');
            $table->dropColumn('jam_finalinterview');
        });
    }
};
