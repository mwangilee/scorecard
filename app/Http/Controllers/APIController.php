<?php

namespace App\Http\Controllers;
use Request;
use DB;

class APIController extends Controller
{   
    
    private $amount;
    private $response;
    private $api_key;
    private $institution_id;
    private $institution_ref_id;
    private $merchant_package_description;
    private $request_meta;

    public function __construct ()
    {
        $this->request_meta = [];
        $this->institution_ref_id = '';
        $this->amount = 0;
        $this->response = [];
        $this->api_key = Request::input('api_key', null);
        $this->merchant_id = Request::input('merchant_id', null);
    }

    public function init_dispatch ()
    {
        
        // Generate a new and unique dispatch nuber
        $this->trx_dispatch_no = strtoupper(
                str_random(3) . date('d') . str_random(2) . date('s') .
                         str_random(2) . date('H') . str_random(2));
        $this->postal_code = Request::input('postal_code', - 1);
        $this->merchant_package_description = Request::input(
                'merchant_package_description');
        $this->merchant_ref_id = Request::input('merchant_ref_id');
        
        $this->request_meta = [
                'request_method' => 'init_scorecard',
                'merchant_id' => $this->institution_id,
                'merchant_package_description' => $this->merchant_package_description,
                'merchant_ref_id' => $this->merchant_ref_id
        ];
        
        // Aunthenticate institution
        if (! ApiController::validate_merchant($this->api_key, 
                $this->merchant_id)) {
            $this->response = [
                    'status_code' => 1,
                    'status' => 'Authentication Failure',
                    'request_method' => 'confirm_dispatch',
                    'request_meta' => $this->request_meta,
                    'response_time' => date('Y-m-d H:i:s')
            ];
            return response(json_encode($this->response), 200)->header(
                    'Content-Type', 'Content-type: application/json');
        }
        
        // ensure the merchant posseses a unique merchant_ref_id
        if (ApiController::merchant_ref_id_exists($this->merchant_ref_id, 
                $this->merchant_id)) {
            $this->response = [
                    'code' => 10,
                    'status' => 'Error! merchant_ref_id already exists!',
                    'request_method' => 'init_dispatch',
                    'request_meta' => $this->request_meta,
                    'response_time' => date('Y-m-d H:i:s')
            ];
            
            return response(json_encode($this->response), 200)->header(
                    'Content-Type', 'Content-type: application/json');
        }
        
        // save the request
        if (ApiController::log_dispatch($this->trx_dispatch_no, 
                $this->merchant_id, $this->amount, $this->postal_code, 
                $this->merchant_package_description, $this->merchant_ref_id)) {
            
            $this->response = [
                    'code' => 0,
                    'status' => 'success',
                    'trx_dispatch_no' => $this->trx_dispatch_no,
                    'amount' => $this->amount,
                    'postal_code' => $this->postal_code,
                    'request_meta' => $this->request_meta,
                    'response_time' => date('Y-m-d H:i:s')
            ];
            
            return response(json_encode($this->response), 200)->header(
                    'Content-Type', 'Content-type: application/json');
        } else {
            
            $this->response = [
                    'code' => 500,
                    'status' => 'Error! Internal server error',
                    'request_method' => 'init_dispatch',
                    'request_meta' => $this->request_meta,
                    'response_time' => date('Y-m-d H:i:s')
            ];
            
            return response(json_encode($this->response), 200)->header(
                    'Content-Type', 'Content-type: application/json');
        }
    }

    /*
     * Get all accepted Branches
     *
     * @access public
     * @return json
     */
    public function get_branches ()
    {
        if (! ApiController::validate_merchant($this->api_key, 
                $this->merchant_id)) {
            
            $this->response = [
                    'status_code' => 1,
                    'status' => 'Authentication Failure',
                    'request_method' => 'get_branches',
                    'response_time' => date('Y-m-d H:i:s')
            ];
            
            return response(json_encode($this->response), 200)->header(
                    'Content-Type', 'Content-type: application/json');
        }
        $branches = DB::table('branches')->select('postal_code', 'office')->get();
        return response(json_encode($branches), 200)->header('Content-Type', 
                'Content-type: application/json');
    }

    
    public function cancel_dispatch ()
    {
        if (! ApiController::validate_merchant($this->api_key, 
                $this->merchant_id)) {
            
            $this->response = [
                    'status_code' => 1,
                    'status' => 'Authentication Failure',
                    'request_method' => 'cancel_dispatch',
                    'response_time' => date('Y-m-d H:i:s')
            ];
            
            return response(json_encode($this->response), 200)->header(
                    'Content-Type', 'Content-type: application/json');
        }
        
        $this->trx_dispatch_no = Request::input('trx_dispatch_no', null);
        
        $this->request_meta = [
                'trx_dispatch' => $this->trx_dispatch_no,
                'merchant_id' => $this->merchant_id
        ];
        
        if (ApiController::is_processed($this->trx_dispatch_no)) {
            $this->response = [
                    'status_code' => 13,
                    'status' => 'Error! Dispatch has already been processed. Contact Postal corporation of Kenya for further assistance',
                    'request_method' => 'cancel_dispatch',
                    'request_meta' => $this->request_meta,
                    'response_time' => date('Y-m-d H:i:s')
            ];
            
            return response(json_encode($this->response), 200)->header(
                    'Content-Type', 'Content-type: application/json');
        }
        
        if (! ApiController::is_confirmed($this->trx_dispatch_no)) {
            $this->response = [
                    'status_code' => 14,
                    'status' => 'Error! Dispatch is currently not confirmed',
                    'request_method' => 'cancel_dispatch',
                    'request_meta' => $this->request_meta,
                    'response_time' => date('Y-m-d H:i:s')
            ];
            
            return response(json_encode($this->response), 200)->header(
                    'Content-Type', 'Content-type: application/json');
        }
        
        if (ApiController::reverse_dispatch($this->trx_dispatch_no, 
                $this->merchant_id)) {
            
            $this->response = [
                    'status_code' => 0,
                    'status' => 'Success',
                    'request_method' => 'cancel_dispatch',
                    'request_meta' => $this->request_meta,
                    'response_time' => date('Y-m-d H:i:s')
            ];
            
            return response(json_encode($this->response), 200)->header(
                    'Content-Type', 'Content-type: application/json');
        } else {
            
            $this->response = [
                    'status_code' => 500,
                    'status' => 'Error! Server error!',
                    'request_method' => 'cancel_dispatch',
                    'request_meta' => $this->request_meta,
                    'response_time' => date('Y-m-d H:i:s')
            ];
            
            return response(json_encode($this->response), 200)->header(
                    'Content-Type', 'Content-type: application/json');
        }
    }

    /*
     * Confirm dispatch request
     *
     * @access public
     * @return json
     */
    public function confirm_dispatch ()
    {
        if (! ApiController::validate_merchant($this->api_key, 
                $this->merchant_id)) {
            
            $this->response = [
                    'status_code' => 1,
                    'status' => 'Authentication Failure',
                    'request_method' => 'confirm_dispatch',
                    'response_time' => date('Y-m-d H:i:s')
            ];
            
            return response(json_encode($this->response), 200)->header(
                    'Content-Type', 'Content-type: application/json');
        }
        
        $this->trx_dispatch_no = Request::input('trx_dispatch_no', null);
        $dispatch_info = ApiController::get_dispatch($this->trx_dispatch_no, 
                $this->merchant_id);
        
        if ($dispatch_info == null) {
            
            $this->response = [
                    'status_code' => 3,
                    'status' => 'Error! dispatch does not exist',
                    'request_method' => 'confirm_dispatch',
                    'response_time' => date('Y-m-d H:i:s')
            ];
        } else 
            if ($dispatch_info->is_confirmed == 'YES') {
                
                $this->response = [
                        'status_code' => 4,
                        'status' => 'Error! dispatch does has already been confirmed',
                        'request_method' => 'confirm_dispatch',
                        'response_time' => date('Y-m-d H:i:s')
                ];
            } else {
                
                DB::table('dispatch_request_dbx')->where('trx_dispatch_no', 
                        $this->trx_dispatch_no)->update(
                        [
                                'is_confirmed' => 'YES'
                        ]);
                
                $this->response = [
                        'status_code' => 0,
                        'status' => 'Success',
                        'request_method' => 'confirm_dispatch',
                        'response_time' => date('Y-m-d H:i:s')
                ];
            }
        
        return response(json_encode($this->response), 200)->header(
                'Content-Type', 'Content-type: application/json');
    }

    /*
     * authenticate API using api_key and merchant_id
     *
     * @access public
     * @param $api_key
     * @param $merchant_id
     * @return bool
     */
    public static function validate_merchant ($api_key, $institution_id)
    {
        $u = DB::table('tbl_institutions')->where('api_key', 
                hash('sha256', $api_key))
            ->where('institution_id', $institution_id)
            ->where('status', 'ACTIVE')
            ->first();
        return ($u != null) ? true : false;
    }

    public static function log_dispatch ($trx_dispatch_no, $merchant_id, $amount, 
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

    public static function get_dispatch ($trx_dispatch_no, $merchant_id)
    {
        return DB::table('dispatch_request_dbx')->where('trx_dispatch_no', 
                $trx_dispatch_no)
            ->where('merchant_id', $merchant_id)
            ->first();
    }

    /*
     * reverse dispatch using
     *
     * @access public
     * @param string $trx_dispatch_no
     * @param int $merchant_id
     * @return bool
     */
    public static function reverse_dispatch ($trx_dispatch_no, $merchant_id)
    {
        return DB::table('dispatch_request_dbx')->where('trx_dispatch_no', 
                $trx_dispatch_no)
            ->where('merchant_id', $merchant_id)
            ->where('status', 'pending')
            ->update(
                [
                        'is_confirmed' => 'NO'
                ]);
    }

    public static function is_processed ($trx_dispatch_no)
    {
        $is_processed = DB::table('dispatch_request_dbx')->where(
                'trx_dispatch_no', $trx_dispatch_no)->pluck('status');
        
        return ($is_processed != 'PENDING') ? true : false;
    }

    public static function is_confirmed ($trx_dispatch_no)
    {
        $is_confirmed = DB::table('dispatch_request_dbx')->where(
                'trx_dispatch_no', $trx_dispatch_no)
            ->where('status', 'PENDING')
            ->pluck('is_confirmed');
        
        return ($is_confirmed == 'YES') ? true : false;
    }

    public static function merchant_ref_id_exists ($insit_ref_id, $merchant_id)
    {
        $ref_id_exist = DB::table('dispatch_request_dbx')->where(
                'merchant_ref_id', $merchant_ref_id)
            ->where('merchant_id', $merchant_id)
            ->first();
        return ($ref_id_exist != null) ? true : false;
    }
}
