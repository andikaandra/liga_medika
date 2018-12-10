<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEticketsTable extends Migration
{
    public function up()
    {
        Schema::create('etickets', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('hfgm_id');
            $table->text('nomor_ticket');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('etickets');
    }
}
