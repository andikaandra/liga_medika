<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInamscTable extends Migration
{
    public function up()
    {
        Schema::create('inamsc', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->string('type');
            $table->text('link_travel_plan');
            $table->text('file_path');
            $table->integer('status_pembayaran')->nullable();
            $table->integer('status_lolos');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('inamsc');
    }
}
