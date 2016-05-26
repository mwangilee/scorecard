<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use App\Categories;
use App\Parameters;
use App\ScoreCard;
use App\ScoreCardWeights;
use App\User;
use App\Utility;
use DB;
use Validator;
use Request;


class HomeController extends Controller {

    public $message;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function testDatabase() {
        $user = factory(App\User::class)->make();

        // Use model in tests...
    }

    public function index() {

        return view('forms.scorecards', ['scorecards' => $scorecards]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        //
    }

    public function dashboard() {
        return view('forms.dashboard');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        //
    }

    public function scorecards() {

        $scorecards = DB::table('tbl_scorecard')
                ->join('tbl_scorecard_categories', 'tbl_scorecard.category_id', '=', 'tbl_scorecard_categories.id')
                ->select('tbl_scorecard.*', 'tbl_scorecard_categories.name as '
                        . 'category', 'tbl_scorecard.name as scorecardname ', 'tbl_scorecard.id as scoreid')
                ->orderBy('tbl_scorecard.id', 'asc')
                ->get();

        return view('grids.scorecards', ['scorecards' => $scorecards]);
    }

    public function editscorecard($id = null, $action = null) {


        if (Request::isMethod('post')) {

            $id = Request::input('id');
            $data = [
                'name' => Request::input('name'),
                'status' => Request::input('status'),
                'description' => Request::input('description'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')];

            if (isset($id) && $id > 0) {

                if (DB::table('tbl_scorecard')->where('id', '=', $id)->update($data)) {
                    $message = 'Record has been updated successfully';
                    return redirect()->route('scorecards')->with('message', $message);
                } else {
                    $message = 'Recored failed to update';
                    return redirect()->route('scorecards')->with('fail', $message);
                };
            } 
        } else {

            if (isset($id) && $id > 0 && $action == 2) {

                if (DB::table('tbl_scorecard')->where('id', $id)->delete()) {
                    $message = 'Record has been deleted successfully';
                    return redirect()->route('scorecards')->with('message', $message);
                } else {
                    $message = 'Failed to delete record from database';
                    return redirect()->route('scorecards')->with('message', $message);
                };
            } else {
                $edit = DB::table('tbl_scorecard')
                        ->join('tbl_scorecard_categories', 'tbl_scorecard.category_id', '=', 'tbl_scorecard_categories.id')
                        ->select('tbl_scorecard.*', 'tbl_scorecard_categories.name as '
                                . 'category', 'tbl_scorecard.name as scorecardname ', 'tbl_scorecard.id as scoreid')
                        ->where('tbl_scorecard.id', $id)
                        ->first();

                return view('forms.editscorecards', ['scorecards' => $edit]);
            }
        }
    }

    public function categories() {
        $categories = DB::table('tbl_scorecard_categories') ->orderBy('id', 'asc')->get();
        return view('grids.categories', ['categories' => $categories]);
    }

    public function editcategories($id = null, $action = null) {


        if (Request::isMethod('post')) {

            $id = Request::input('id');
            $data = [
                'name' => Request::input('name'),
                'status' => Request::input('status'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')];

            if (isset($id) && $id > 0) {

                if (DB::table('tbl_scorecard_categories')->where('id', '=', $id)->update($data)) {
                    $message = 'Record has been updated successfully';
                    return redirect()->route('categories')->with('message', $message);
                } else {
                    $message = 'Recored failed to update';
                    return redirect()->route('categories')->with('fail', $message);
                };
            } 
        } else {

            if (isset($id) && $id > 0 && $action == 2) {

                if (DB::table('tbl_scorecard_categories')->where('id', $id)->delete()) {
                    $message = 'Record has been deleted successfully';
                    return redirect()->route('categories')->with('message', $message);
                } else {
                    $message = 'Failed to delete record from database';
                    return redirect()->route('categories')->with('message', $message);
                };
            } else {
                
                $edit = DB::table('tbl_scorecard_categories')
                        ->where('id', $id)
                        ->first();
           

                return view('forms.editcategories', ['categories' => $edit]);
            }
        }
    }

    public function verifyUser(Request $request) {
        if ($request->isMethod('post')) {
            $email = $request->input('email');
            $password = $request->input('password');
            if (Auth::attempt(['email' => $email, 'password' => $password, 'status' => 1])) {
                if ($request->user() && $request->user()->role != 1) {
                    $request->session()->set('user_id', $request->user()->id);
                    $request->session()->set('username', $request->user()->name);
                    $request->session()->set('role', $request->user()->role);
                    //var_dump($request->user()->role);die;
                    if ($request->user()->role != 2)
                        return redirect()->route('dashboard');
                    else {
                        $request->session()->set('emp', Employer::firstOrCreate
                                        (['person_id' => $request->user()->id])->id);
                        return redirect()->route('profile');
                    }
                }
            } else {
                $message = Utility::renderAlert('danger', '<strong>Login failed'
                                . '</strong> Wrong account or password');
                $request->session()->flash('_login', $message);
            }
        }
        return view('index');
    }

}
