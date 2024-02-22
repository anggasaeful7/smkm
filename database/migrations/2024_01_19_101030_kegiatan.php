<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Kegiatan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kegiatan', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal_pelaksanaan');
            $table->foreignId('department_id');
            $table->string('nama_kegiatan');
            $table->string('jeniskegiatan_id');
            $table->string('deskripisi');
            $table->string('ruangan');
            $table->string('letter_file');
            $table->string('letter_type');
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
        Schema::dropIfExists('kegiatan');
    }
}
