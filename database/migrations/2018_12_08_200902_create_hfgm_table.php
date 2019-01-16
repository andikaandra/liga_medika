<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHfgmTable extends Migration
{
    public function up()
    {
        Schema::create('hfgm', function (Blueprint $table) {
          $table->increments('id');
          $table->unsignedInteger('user_id');
          $table->integer('type');
          $table->text('nama');
          $table->text('ktp');
          $table->integer('status_pembayaran');
          $table->integer('status_verif')->default(0);
          $table->integer('jumlah_tiket');
          $table->integer('gelombang');
          $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('hfgm');
    }
}
