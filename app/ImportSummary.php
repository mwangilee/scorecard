<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use DB;

class ImportSummary extends Model
{
    protected $table = 'tblimportsummary';
    protected $fillable = array('id', 'ref_id', 'category_id','status');
    
    public static function getAllImports(){
        return DB::table('tblimportsummary')->get();
    }
    
    public static function getUnprocessedFiles(){
        return DB::table('tblimportsummary')
                      ->where('status', 0)
                      ->get();
    }
}
