<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Parameters extends Model
{
    protected $table = 'tbl_parameters';
    protected $fillable = array('parametername', 'paramtype_bool', 'status');
    
    public static function getAllParameters(){
        return DB::table('tbl_parameters')->get();
    }
    
    
    
}
