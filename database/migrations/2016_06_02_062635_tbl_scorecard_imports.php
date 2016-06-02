<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TblScorecardImports extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_scorecard_imports', function (Blueprint $table) {
            $table->increments('id');
            $table->string('param_1');
            $table->string('param_2');
            $table->string('param_3');
            $table->string('file_name')->nullable();
            $table->string('status')->default('0');
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
         Schema::drop('tbl_scorecard_imports');
    }
}
