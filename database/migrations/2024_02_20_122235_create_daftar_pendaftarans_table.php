<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDaftarPendaftaransTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('daftar_pendaftarans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('daftarkegiatan_id');
            $table->foreignId('user_id');
            $table->foreignId('department_id');
            $table->foreignId('jeniskegiatan_id');
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
        Schema::dropIfExists('daftar_pendaftarans');
    }
}
