<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLombaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lomba', function (Blueprint $table) {
            $table->increments('id');
            $table->text('nama');
            $table->integer('jumlah_gelombang');
            $table->integer('gelombang_sekarang');
            $table->decimal('biaya', 10, 2);
            $table->decimal('dp', 10, 2)->nullable();
            $table->integer('status_pendaftaran')->default(0);
            $table->integer('status_pengumpulan')->default(0);
            $table->integer('kuota');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lomba');
    }
}
