<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TblScoreWeights extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_scorecard_weights', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('parameter_id');
            $table->foreign('parameter_id')->references('id')->on('tbl_parameters')
                   ->onDelete('cascade');
            $table->bigInteger('min');
            $table->bigInteger('max');
            $table->string('value');
            $table->bigInteger('score');
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
         Schema::drop('tbl_scorecard_weights');
    }
}
