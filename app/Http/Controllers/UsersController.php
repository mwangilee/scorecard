<?php

namespace App\Http\Controllers;
use Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Hash;
use Auth;
use Session;
use DB;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Request::isMethod('post')) {
            if (Auth::attempt(
                            array(
                                'email' => Request::input('email'),
                                'password' => Request::input('password')
                    ))) {
                $user = DB::table('users')
                        ->where('email', Request::input('email'))
                        ->first();

                Session::put('name', $user->name);
                Session::put('email', $user->email);
                Session::put('role', $user->role);

                return redirect()->intended('/dashboard');
                
            } else {
              
                return redirect()->route('login')->with('login_alert', 'login failed.Please try again');
               
           
            }
        } else {
            return view('forms.login');
        }
    }
    
     public function formatAlert($message, $alertType) {
        $color = ($alertType == 'danger') ? 'red' : '#528012';
        return "<div class='alert' style='background_color: #fff; border: 1px solid $color; color: $color;'><a href='#' class='alert-link'></a>{$message}</div>";
    }
    
    public function users() {
        $users = DB::table('users')->paginate(10);
        return view('grids.users', ['users' => $users]);
    }
    
    public function adduser() {
        if (Request::isMethod('post')) {
            
             if(DB::table('users')
               ->insert(['institution_id' => 1,
                        'name' => Request::input('name'),
                        'email' => Request::input('email'),
                        'password' => Hash::make(Request::input('password')),
                        'role' => Request::input('role'),
                        'remember_token' => Request::input('_token'),
                        'status' => Request::input('status'),
                        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')])){
                 
                        return redirect()->route('users')->with('message', 'user saved successfully');
                        
                        }else {
                         
                        return redirect()->route('users')->with('fail', 'error saving user');
                            
                        }
           
        }else {
            
             return view('forms.adduser');
              
              
        }
       
    }
    public function edituser($userID=null) {
        
      
        if (Request::isMethod('post')) {
            
            if(DB::table('users')
                    ->where('id', Request::input('id'))
                    ->update(array('name' => Request::input('name'),
                                   'email' => Request::input('email'),
                                   'role' => Request::input('role'),
                                   'status' => Request::input('status'),
                                   'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                               ))){
                
                 return redirect()->route('users')->with('message', 'user edited successfully');
                               }else{
                  return redirect()->route('users')->with('fail', 'error updating user');            
                                   
                               }
            
        }else{
            $users = DB::table('users')->where('id', $userID)->first();
            return view('forms.edituser', ['user' => $users]);
        }
        
    }
    public static function deleteUser($userID) {
        if(DB::table('users')->where('id', $userID)->delete()){
            
            return redirect()->route('users')->with('message', 'user deleted successfully');
            
        }else{
            
            return redirect()->route('users')->with('fail', 'error deleting user'); 
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
