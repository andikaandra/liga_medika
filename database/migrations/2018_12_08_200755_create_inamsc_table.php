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
            $table->integer('type');
            $table->text('link_travel_plan')->nullable();
            $table->integer('status_pembayaran')->nullable();
            $table->integer('status_lolos')->default(0);
            $table->integer('status_verif')->default(0);
            $table->integer('gelombang');
            $table->text('letter_of_originality_path')->nullable();
            $table->string('workshop')->nullable();
            $table->string('accreditation')->nullable();
            $table->text('nama_rekening')->nullable();
            $table->decimal('jumlah_transfer', 15, 2)->nullable();
            $table->text('bukti_pembayaran')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('inamsc');
    }
}
