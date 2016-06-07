<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblimportsummaryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('tblimportsummary', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('category_id');
            $table->string('ref_id');
            $table->string('scorecardname');
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
        Schema::drop('tblimportsummary');
    }
}
