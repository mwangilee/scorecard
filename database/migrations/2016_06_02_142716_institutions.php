<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Institutions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_institutions', function (Blueprint $table) {
            $table->increments('institution_id');
            $table->string('institution_name');
            $table->string('api_key');
            $table->string('password');
            $table->string('institution_IP');  
            $table->string('email'); 
            $table->string('msisdn'); 
            $table->string('isConfirmed'); 
            $table->string('activation_code'); 
            $table->string('filename');
            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('tbl_institutions');
    }
}
