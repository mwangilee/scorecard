<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ScoreCardWeights extends Model
{
    protected $table = 'tbl_scorecard_weights';
    protected $fillable = array('parameter_id', 'min', 'max','score','status');
    //
}
