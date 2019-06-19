<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImssoparticipantsTable extends Migration
{
    public function up()
    {
        Schema::create('imssoparticipants', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('imsso_id');
            $table->text('nama');
            $table->text('universitas');
            $table->text('jurusan');
            $table->text('file_path');
            $table->integer('berkas_lengkap')->nullable();
            $table->string('deskripsi_berkas')->nullable();

        });
    }

    public function down()
    {
        Schema::dropIfExists('imssoparticipants');
    }
}
