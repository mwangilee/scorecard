<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TblScoreCard extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('tbl_scorecard', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('category_id');
            $table->foreign('category_id')->references('id')->on('tbl_scorecard_categories')
                   ->onDelete('cascade');
            $table->string('name');
            $table->string('description');
            $table->Integer('score');
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
        Schema::drop('tbl_scorecard');
    }
}
