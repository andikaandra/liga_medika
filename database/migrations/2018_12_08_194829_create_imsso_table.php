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
          $table->text('link_travel_plan')->nullable();
          $table->integer('sport_type');
          $table->text('file_path');
          $table->integer('status_pembayaran')->nullable();
          $table->integer('status_lolos')->default(0);
          $table->integer('status_verif')->default(0);
          $table->integer('gelombang');
          $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('imsso');
    }
}
