<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInamscparticipantsTable extends Migration
{
    public function up()
    {
        Schema::create('inamscparticipants', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('inamsc_id');
            $table->text('nama');
            $table->text('universitas');
            $table->text('jurusan');
            $table->text('file_path');
            $table->text('kode_ambassador')->nullable();
            $table->string('workshop')->nullable();
            $table->string('accreditation')->nullable();
            // $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('inamscparticipants');
    }
}
