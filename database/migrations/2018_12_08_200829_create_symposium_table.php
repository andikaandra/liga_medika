<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSymposiumTable extends Migration
{
    public function up()
    {
        Schema::create('symposium', function (Blueprint $table) {
          $table->increments('id');
          $table->unsignedInteger('id_user');
          $table->text('nama');
          $table->text('ktp');
          $table->integer('status_pembayaran');
          $table->integer('gelombang');
          $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('symposium');
    }
}
