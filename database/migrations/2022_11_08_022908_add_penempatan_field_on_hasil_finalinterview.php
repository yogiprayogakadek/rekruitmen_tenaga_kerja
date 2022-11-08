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
        Schema::table('hasil_finalinterview', function (Blueprint $table) {
            $table->string('penempatan', 100)->after('nama_hotel');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('hasil_finalinterview', function (Blueprint $table) {
            $table->dropColumn('penempatan');
        });
    }
};
