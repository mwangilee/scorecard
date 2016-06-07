<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TblParameters extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_parameters', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('category_id');
            $table->foreign('category_id')->references('id')->on('tbl_scorecard_categories')
                   ->onDelete('cascade');
            $table->string('parametername',100)->unique();
            $table->boolean('paramtype_bool')->nullable();;
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
         Schema::drop('tbl_parameters');
    }
}
