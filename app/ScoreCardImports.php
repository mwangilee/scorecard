<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use DB;

class ScoreCardImports extends Model
{
     protected $table = 'tbl_scorecard_imports';
    protected $fillable = array('id', 'param', 'value','ref_id','status');
    
    public static function getAllImports(){
        return DB::table('tbl_scorecard_imports')->get();
    }
    
    public static function getUnprocessedImports($ref_id){
        return DB::table('tbl_scorecard_imports')
                      ->where('status', 0)
                      ->where('ref_id', $ref_id)
                      ->get();
    }
}
