<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImarcTable extends Migration
{
    public function up()
    {
        Schema::create('imarc', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->text('link_travel_plan');
            $table->text('file_path');
            $table->integer('status_pembayaran');
            $table->integer('status_lolos')->default(0);
            $table->integer('gelombang');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('imarc');
    }
}
