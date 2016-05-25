<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ScoreCard extends Model

{
    protected $table = 'tbl_scorecard';
    protected $fillable = array('name', 'category_id','description','score','status');
    //
}
