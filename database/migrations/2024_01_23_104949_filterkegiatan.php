<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Filterkegiatan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('filterkegiatan', function (Blueprint $table) {
            $table->unsignedBigInteger('department_id');
            $table->unsignedBigInteger('jeniskegiatan_id');
            $table->unsignedBigInteger('daftarkegiatan_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('filterkegiatan');
    }
}
