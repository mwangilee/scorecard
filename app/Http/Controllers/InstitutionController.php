<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use Hash;
use App\Utility;


class InstitutionController extends Controller
{
    public static function getAllInstitutions ()
    {
        return DB::table('tbl_institutions')
            ->get();
    }

    public static function getAllInstitutionsPaginated ($perPage)
    {
        return DB::table('tbl_institutions')
            ->paginate($perPage);
    }
    
    
    public static function get_business_name($institution_id){
        return DB::table('tbl_institutions')
            ->where('institution_id', $institution_id)
            ->pluck('institution_name');
    }
    
    public static function createaccount($institution_id){
        
        
        $key = strtoupper(str_random(25).date('Y').str_random(10).date('m'));
        $encrypted_key =  hash('sha256',$key);
        
        //@@deprecated -- we are not to send the merchant an encrypted key 
        ////$API_key = Utility::auto_generate_API_key();
        
        $institution = InstitutionController::get_institution_data($institution_id);
        //dd($institution);
        $random_password = str_random(8);
        $password = hash::make($random_password);
      
        //update API_key
        DB::table('tbl_institutions')
            ->where('institution_id', $institution_id)
            ->update(array('api_key' => $encrypted_key,'password'=>$password));
        
        //create user creadentials
        DB::table('users')->insert(
            array(
                'email' => $institution->email,
                'password' => $password,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
                'status' => 'ACTIVE',
                'role' => 'INSTITUTION',
                'name' => $institution->institution_name,
                'institution_id' => $institution_id 
            )
        );
        
        return array(
          'api_key' => $key,
          'password' => $random_password,
          'username' => $institution->email
        );
        
    }
    
    
    
    public static function get_institution_data($institution_id){
        return DB::table('tbl_institutions')
            ->where('institution_id', $institution_id)
            ->first();
    }
}
