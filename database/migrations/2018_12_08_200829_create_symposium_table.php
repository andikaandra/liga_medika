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
          $table->unsignedInteger('user_id');
          $table->text('nama');
          $table->text('ktp');
          $table->integer('status_pembayaran');
          $table->integer('gelombang');
          $table->integer('workshop');
          $table->string('sertifikat')->default("no");
          $table->string('universitas')->nullable(true);
          $table->integer('status_verif')->default(0);
          $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('symposium');
    }
}
