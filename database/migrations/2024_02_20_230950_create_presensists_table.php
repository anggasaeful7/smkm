<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePresensistsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('presensists', function (Blueprint $table) {
            $table->id();
            $table->integer('daftarkegiatan_id');
            $table->integer('user_id');
            $table->string('npm_nidn')->nullable();
            $table->string('prodi_id')->nullable();
            $table->string('instansi')->nullable();
            $table->string('letter_file');
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
        Schema::dropIfExists('presensists');
    }
}
