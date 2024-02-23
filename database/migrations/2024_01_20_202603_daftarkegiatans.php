<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Daftarkegiatans extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('daftarkegiatans', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal_pelaksanaan');
            $table->unsignedBigInteger('department_id');
            $table->string('nama_kegiatan');
            $table->unsignedBigInteger('jeniskegiatan_id');
            $table->string('deskripsi');
            $table->string('ruangan');
            $table->string('letter_file');
            $table->string('letter_type');
            $table->string('batas');
            $table->string('sertifikat')->nullable();
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
        Schema::dropIfExists('daftarkegiatans');
    }
}
