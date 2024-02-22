<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Datapendaftars extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('datapendaftars', function (Blueprint $table) {
            $table->id();
            $table->string('user_id');
            $table->string('npm_nidn');;
            $table->string('instansi');
            $table->string('jenisikutserta_id');
            $table->string('audience_type');
            $table->timestamps();
        });    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('datapendaftars');
    }
}
