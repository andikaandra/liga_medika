<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImssoTable extends Migration
{
    public function up()
    {
        Schema::create('imsso', function (Blueprint $table) {
          $table->increments('id');
          $table->unsignedInteger('user_id');
          $table->text('link_travel_plan');
          $table->text('file_path');
          $table->integer('status_pembayaran');
          $table->integer('status_lolos');
          $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('imsso');
    }
}
