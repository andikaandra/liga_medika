<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImarcparticipantsTable extends Migration
{
    public function up()
    {
        Schema::create('imarcparticipants', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('imarc_id');
            $table->text('universitas');
            $table->text('jurusan');
            // $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('imarcparticipants');
    }
}
