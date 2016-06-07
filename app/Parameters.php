<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use DB;

class Parameters extends Model
    {
    protected $table = 'tbl_parameters';
    protected $fillable = array('parametername', 'paramtype_bool', 'status');
    
    public static function getAllParameters(){
        return DB::table('tbl_parameters')->get();
    }
    
    public static function getParameterId($param){
        return DB::table('tbl_parameters')
                ->select('id')
                ->where('parametername', $param)
                ->first();
    }   
    
    
    
    
    
}
