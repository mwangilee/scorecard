<?php
namespace App;
/**
 * Description of Institution
 *
 * @author lee
 */
use Request;
use DB;
use Hash;
use App\Utility;

class Institution
{

    public static function getAllInstitutions()
    {
        return DB::table('tbl_institutions')
            ->get();
    }

    public static function getAllInstitutionPaginated ($perPage)
    {
        return DB::table('tbl_institution')
            ->paginate($perPage);
    }
    
    
    public static function get_business_name($institution_id){
        return DB::table('tbl_institutions')
            ->where('institution_id', $institution_id)
            ->pluck('institution_name');
    }
    
    public static function create_institution_access_account($institution_id){
        
        
        $key = strtoupper(str_random(25).date('Y').str_random(10).date('m'));
        $encrypted_key =  hash('sha256',$key);
        
        //@@deprecated -- we are not to send the institution an encrypted key 
        ////$API_key = Utility::auto_generate_API_key();
        
        $institution = Institution::get_institution_data($institution_id);
        $random_password = str_random(8);
        
        //update API_key
        DB::table('tbl_institutions')
            ->where('institution_id', $institution_id)
            ->update(array('api_key' => $encrypted_key));
        
        //create user creadentials
        DB::table('users')->insert(
            array(
                'email' => $merchant->email,
                'password' => hash::make($random_password),
                'created_at' => date('Y-m-d H:i:s'),
                'status' => 'ACTIVE',
                'role' => 'INSTITUTION',
                'name' => $institution->business_name,
                'business_id' => $institution_id 
            )
        );
        
        return array(
          'api_key' => $key,
          'password' => $random_password,
          'username' => $merchant->email
        );
        
    }
    
    
    
    public static function get_institution_data($institution_id){
        return DB::table('tbl_institutions')
            ->where('institutions_id', $institution_id)
            ->first();
    }
    
}