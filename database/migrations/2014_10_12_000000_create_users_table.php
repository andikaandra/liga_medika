<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->integer('role')->default(1); //1 user, 2 admin
            $table->string('penanggung_jawab')->nullable();
            $table->string('universitas')->nullable();
            $table->integer('cabang')->nullable();//1 imsso,2 imarc,3 inamsc, 4 hfgm
            $table->integer('cabang_spesifik')->nullable(); //1 symposium, 2 vid edukasi, 3 publikasi poster, 4 litrev, 5 rpp
            $table->tinyInteger('verified')->default(0); //verifikasi akun
            $table->tinyInteger('lomba_verified')->default(0); //verifikasi oleh admin tentang lomba yang diikuti
            $table->string('email_token')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('users');
    }
}
