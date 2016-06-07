<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Request;
use Hash;
use DB;
use Input;


class APIController extends Controller
{   
    
    private $response;
    private $api_key;
    private $institution_id;
    private $institution_ref_id;
    private $request_meta;
    private $parameter_name;
    private $value;

    public function __construct ()
    {
       
     
        $headers = getallheaders();
        $this->api_key = $headers['Api-Key'];
        $this->password = $headers['Password'];
        $this->institution_id = $headers['Institution_ID'];
        //$this->request_meta = [];
        //dd($this->request_meta[] = Request::input());
        $this->institution_ref_id = '';
        $this->response = [];
        
    }

    public function get_scorecard ()
    {
        
        // Generate a new and unique dispatch nuber
       
        $this->request_meta = [
                'request_method' => 'get_scorecard',
                'institution_id' => $this->institution_id,
                'parameter_name' => $this->parameter_name,
                'value' => $this->value
        ];
        
        // Aunthenticate institution
        if (! ApiController::validate_institution($this->api_key, 
                $this->institution_id,$this->password)) {
                     $this->response = [
                    'status_code' => '01',
                    'status' => 'Authentication Failure',
                    'request_method' => 'get_scorecard',
                    'request_meta' => $this->request_meta,
                    'response_time' => date('Y-m-d H:i:s')
            ];
            return response(json_encode($this->response), 200)->header(
                    'Content-Type', 'Content-type: application/json');
        }
        
        // ensure the insitutution posseses a unique inistution_ref_id
        if (APIController::institution_ref_id_exists($this->institution_ref_id, 
                $this->institution_id)) {
            $this->response = [
                    'code' => '02',
                    'status' => 'Error! institution_ref_id already exists!',
                    'request_method' => 'get_scorecard',
                    'request_meta' => $this->request_meta,
                    'response_time' => date('Y-m-d H:i:s')
            ];
            
            return response(json_encode($this->response), 200)->header(
                    'Content-Type', 'Content-type: application/json');
        }
        
        dd($this->request_meta);
        // save the request
        if (ApiController::log_request($this->institution_id, 
                $this->institution_ref_id, $this->request_meta)) {
            
            $this->response = [
                    'institution_id' => '00',
                    'ref_id' => $this->institution_ref_id,
                    'body' => $this->request_meta,
                    'status' => 0,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s')
            ];
            
            return response(json_encode($this->response), 200)->header(
                    'Content-Type', 'Content-type: application/json');
        } else {
            
            $this->response = [
                    'code' => 500,
                    'status' => 'Error! Internal server error',
                    'request_method' => 'get_scorecard',
                    'request_meta' => $this->request_meta,
                    'response_time' => date('Y-m-d H:i:s')
            ];
            
            return response(json_encode($this->response), 200)->header(
                    'Content-Type', 'Content-type: application/json');
        }
    }

    public static function validate_institution ($api_key, $institution_id,$password)
    {

         $pass = DB::table('tbl_institutions')
                 ->where('institution_id', $institution_id)
                 ->first();
         
        
         if (Hash::check($password, $pass->password))
            {
              //passwords match
    
            }else{
               //passwords do not match
                return false;
            }
         
         
        $u = DB::table('tbl_institutions')->where('api_key', 
                hash('sha256', $api_key))
            ->where('institution_id', $institution_id)
            ->where('status', 'ACTIVE')
            ->first();
      
       
        return ($u != null) ? true : false;
    }

    public static function log_request ($trx_dispatch_no, $merchant_id, $amount, 
            $postal_code, $merchant_package_description, $merchant_ref_id)
    {
        return DB::table('dispatch_request_dbx')->insert(
                [
                        'trx_dispatch_no' => $trx_dispatch_no,
                        'merchant_id' => $merchant_id,
                        'amount' => $amount,
                        'status' => 'PENDING',
                        'postal_code' => $postal_code,
                        'created_at' => date('Y-m-d H:i:s'),
                        'is_confirmed' => 'NO',
                        'merchant_package_description' => $merchant_package_description,
                        'merchant_ref_id' => $merchant_ref_id
                ]);
    }
    public static function institution_ref_id_exists ($institution_ref_id, 
            $institution_id)
    {
        $ref_id_exist = DB::table('tbl_api_requests')
            ->where('ref_id', $institution_ref_id)
            ->where('institution_id', $institution_id)
            ->first();
        return ($ref_id_exist != null) ? true : false;
    }
    
    public function calculate_scorecard ($request_meta)
    {
        
        
    }

    
  
}
