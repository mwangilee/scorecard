<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    protected $table = 'tbl_scorecard_categories';
    protected $fillable = array('name', 'status');
    //
}
