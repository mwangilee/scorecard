<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use DB;

class ScoreCardWeights extends Model
{
    protected $table = 'tbl_scorecard_weights';
    protected $fillable = array('parameter_id','category_id', 'min', 'max','score','status');
    //
    public static function getScore($id,$category_id,$value){
        
        return DB::table('tbl_scorecard_weights')
                ->select('score')
                 ->where('category_id',$category_id)
                 ->Where('min', '<=', $value)
                 ->Where('max', '>=', $value)
                 ->where('parameter_id', $id)
                 ->first();
    }
}
