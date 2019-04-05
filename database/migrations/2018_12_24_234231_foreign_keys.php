<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ForeignKeys extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('inamsc', function(Blueprint $table){
          $table->foreign('user_id')->references('id')->on('users');
        });

        Schema::table('symposium', function(Blueprint $table){
          $table->foreign('user_id')->references('id')->on('users');
        });

        Schema::table('payments', function(Blueprint $table){
          $table->foreign('user_id')->references('id')->on('users');
        });

        Schema::table('imsso', function(Blueprint $table){
          $table->foreign('user_id')->references('id')->on('users');
        });

        Schema::table('imarc', function(Blueprint $table){
          $table->foreign('user_id')->references('id')->on('users');
        });

        Schema::table('hfgm', function(Blueprint $table){
          $table->foreign('user_id')->references('id')->on('users');
        });

        Schema::table('etickets', function(Blueprint $table){
          $table->foreign('hfgm_id')->references('id')->on('hfgm');
        });

        Schema::table('inamscparticipants', function(Blueprint $table) {
          $table->foreign('inamsc_id')->references('id')->on('inamsc');
        });

        Schema::table('imssoparticipants', function(Blueprint $table) {
          $table->foreign('imsso_id')->references('id')->on('imsso');
        });

        Schema::table('imarcparticipants', function(Blueprint $table) {
          $table->foreign('imarc_id')->references('id')->on('imarc');
        });

        // Schema::table('submission', function(Blueprint $table) {
        //   $table->foreign('inamsc_id')->references('id')->on('inamsc');
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
