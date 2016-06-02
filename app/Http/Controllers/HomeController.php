<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Input;
use Carbon\Carbon;
use App\Categories;
use App\Parameters;
use App\ScoreCard;
use App\ScoreCardWeights;
use Symfony\Component\Finder\Tests\Iterator\Iterator;
use Illuminate\Support\Facades\Config;
use App\User;
use App\Utility;
use DB;
use Validator;
use Request;

class HomeController extends Controller {
//<editor-fold defaultstate="collapsed" desc="defaults">

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function test() {


        // Use model in tests...
    }

    public function index() {

        return view('forms.login');
    }

    public function dashboard() {
        return view('forms.dashboard');
    }

    public function fileupload() {
        if (Request::isMethod('post')) {

            $files = json_decode(file_get_contents(url('/assets/js/vendor/file-upload/server/php/')), true);

            // Request the file input named 'attachments'
            //$files = Request::file('file');
            foreach ($files as $key => $story) {
                if (is_array($story)) {
                    foreach ($story as $subkey => $subvalue) {
                        if (is_array($subvalue)) {

                            foreach ($subvalue as $key => $subsubvalue) {
                                $filename = $subvalue['url'];
                                $file = $subvalue['url'];
                                $file = fopen($file, "r");
                                $i = 0;
                                while (!feof($file)) {
                                    $value = (fgetcsv($file, 0, ','));
                                    if ($i > 0) {
                                        if ($value[0] != '') {
                                            $inserts[] = "('" . $value[0] . "','"
                                                    . $value["1"] . "','"
                                                    . $value["2"] . "','"
                                                    . $filename . "','"
                                                    . 0 . "','"
                                                    . Carbon::now()->format('Y-m-d H:i:s') . "','"
                                                    . Carbon::now()->format('Y-m-d H:i:s') . "')";
                                        }
                                    } elseif ($i == 0) {
                                        $fields = $value;
                                    }
                                    $i++;
                                }

                                DB::insert("INSERT INTO tbl_scorecard_imports (param_1,param_2,param_3,file_name,status,created_at,updated_at) VALUES " . implode(",", $inserts));
                                fclose($file);

                                /* $filelocation = Config::get('mail.file_location').$filename;
                                  $insert = DB::select("SELECT * from fn_copy_from_csv('tbl_scorecard_imports', 'param_1 ,param_2,param_3', '$filelocation', false, false, ',', '','''''', '\', '')");
                                 * 
                                 */
                                return redirect()->route('fileupload')->with('message', 'file uploaded successfully');
                            }
                        } else {
                            echo $subvalue . "<br />";
                        }
                    }
                } else {
                    echo $story . "<br />";
                }
            }
        } else {
       
            $params = DB::table('tbl_scorecard_categories')
                    ->get();
            return view('forms.fileupload', ['params' => $params]);
        }
    }

//</editor-fold> 
//<editor-fold defaultstate="collapsed" desc="scorecards">
    public function scorecards() {
        /**
         * Display a list of the score cards in a grid.
         */
        $scorecards = DB::table('tbl_scorecard')
                ->join('tbl_scorecard_categories', 'tbl_scorecard.category_id', '=', 'tbl_scorecard_categories.id')
                ->select('tbl_scorecard.*', 'tbl_scorecard_categories.name as '
                        . 'category', 'tbl_scorecard.name as scorecardname ', 'tbl_scorecard.id as scoreid')
                ->orderBy('tbl_scorecard.id', 'asc')
                ->get();

        return view('grids.scorecards', ['scorecards' => $scorecards]);
    }

    public function editscorecard($id = null, $action = null) {
        /**
         * Display forms that edit/delete scorecards.
         */
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

//</editor-fold>
//<editor-fold defaultstate="collapsed" desc="categories">
    public function categories() {
        $categories = DB::table('tbl_scorecard_categories')->orderBy('id', 'asc')->get();
        return view('grids.categories', ['categories' => $categories]);
    }

    public function addcategory(Request $request) {

        if (Request::isMethod('post')) {

            if (DB::table('tbl_scorecard_categories')->insert([
                        'name' => Request::input('name'),
                        'status' => Request::input('status'),
                        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')])) {

                $message = 'Recored inserted successfully';

                return redirect()->route('categories')->with('message', $message);
            } else {

                $message = 'Recored failed to insert';
                return redirect()->route('categories')->with('fail', $message);
            };
        } else {

            return view('forms.addcategory');
        }
        //
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

//</editor-fold>
//<editor-fold defaultstate="collapsed" desc="weights">
    public function weights() {
        /**
         * Display a list of the score cards in a grid.
         */
        $weights = DB::table('tbl_scorecard_weights')
                ->join('tbl_parameters', 'tbl_scorecard_weights.parameter_id', '=', 'tbl_parameters.id')
                ->join('tbl_scorecard_categories', 'tbl_parameters.category_id', '=', 'tbl_scorecard_categories.id')
                ->select('tbl_scorecard_weights.*', 'tbl_scorecard_categories.name as categoryname', 'tbl_parameters.parametername', 'tbl_parameters.paramtype_bool as isboolean ', 'tbl_parameters.status as paramstatus')
                ->orderBy('tbl_scorecard_weights.id', 'asc')
                ->get();



        return view('grids.weights', ['weights' => $weights]);
    }

    public function addweights(Request $request) {

        if (Request::isMethod('post')) {

            $parameter_id = explode('-', Request::input('parametername'));

            if (DB::table('tbl_scorecard_weights')->insert([
                        'parameter_id' => trim($parameter_id[0]),
                        'min' => Request::input('min'),
                        'max' => Request::input('max'),
                        'value' => Request::input('value'),
                        'score' => Request::input('score'),
                        'status' => Request::input('status'),
                        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')])) {

                $message = 'Recored inserted successfully';

                return redirect()->route('weights')->with('message', $message);
            } else {

                $message = 'Recored failed to insert';
                return redirect()->route('weights')->with('fail', $message);
            };
        } else {
            $params = DB::table('tbl_scorecard_weights')
                    ->get();

            return view('forms.addweights', ['params' => $params]);
        }
        //
    }

    public function editweights($id = null, $action = null) {


        if (Request::isMethod('post')) {
            $id = Request::input('id');
            $data = [
                'min' => Request::input('min'),
                'max' => Request::input('max'),
                'value' => Request::input('value'),
                'score' => Request::input('score'),
                'status' => Request::input('status'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')];

            if (isset($id) && $id > 0) {

                if (DB::table('tbl_scorecard_weights')->where('id', '=', $id)->update($data)) {
                    $message = 'Record has been updated successfully';
                    return redirect()->route('weights')->with('message', $message);
                } else {
                    $message = 'Recored failed to update';
                    return redirect()->route('weights')->with('fail', $message);
                };
            }
        } else {

            if (isset($id) && $id > 0 && $action == 2) {

                if (DB::table('tbl_scorecard_weights')->where('id', $id)->delete()) {
                    $message = 'Record has been deleted successfully';
                    return redirect()->route('weight')->with('message', $message);
                } else {
                    $message = 'Failed to delete record from database';
                    return redirect()->route('weight')->with('fail', $message);
                };
            } else {

                $edit = DB::table('tbl_scorecard_weights')
                        ->join('tbl_parameters', 'tbl_scorecard_weights.parameter_id', '=', 'tbl_parameters.id')
                        ->select('tbl_scorecard_weights.*', 'tbl_parameters.parametername', 'tbl_parameters.paramtype_bool as isboolean ', 'tbl_parameters.status as paramstatus')->orderBy('tbl_scorecard_weights.id', 'asc')
                        ->where('tbl_scorecard_weights.id', $id)
                        ->first();

                return view('forms.editweights', ['weights' => $edit]);
            }
        }
    }

//</editor-fold>
//<editor-fold defaultstate="collapsed" desc="scorecardparams">
    public function scorecardparams() {
        /**
         * Display a list of the score cards params in a grid.
         */
        $scorecardparams = DB::table('tbl_parameters')
                ->join('tbl_scorecard_categories', 'tbl_parameters.category_id', '=', 'tbl_scorecard_categories.id')
                ->select('tbl_parameters.*', 'tbl_scorecard_categories.name as categoryname')
                ->orderBy('tbl_parameters.id', 'asc')
                ->get();

        return view('grids.scorecardparams', ['scorecardparams' => $scorecardparams]);
    }

    public function addscorecardparams(Request $request) {

        if (Request::isMethod('post')) {

            $category_id = explode('-', Request::input('categoryname'));
            if (DB::table('tbl_parameters')->insert([
                        'category_id' => trim($category_id[0]),
                        'parametername' => Request::input('parametername'),
                        'paramtype_bool' => $bool = (Request::input('paramtype_bool') === 'True' ? '1' : '0'),
                        'status' => Request::input('status'),
                        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                        'updated_at' => Carbon::now()->format('Y-m-d H:i:s')])) {

                $message = 'Recored inserted successfully';

                return redirect()->route('scorecardparams')->with('message', $message);
            } else {

                $message = 'Recored failed to insert';
                return redirect()->route('scorecardparams')->with('fail', $message);
            };
        } else {

            $params = DB::table('tbl_scorecard_categories')
                    ->get();
            return view('forms.addscorecardparams', ['params' => $params]);
        }
        //
    }

    public function editscorecardparams($id = null, $action = null) {


        if (Request::isMethod('post')) {
            $id = Request::input('id');

            $category_id = explode('-', Request::input('categoryname'));
            $data = [
                'parametername' => Request::input('parametername'),
                'paramtype_bool' => $bool = (Request::input('paramtype_bool') === 'True' ? '1' : '0'),
                'status' => Request::input('status'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')];

            if (isset($id) && $id > 0) {

                if (DB::table('tbl_parameters')->where('id', '=', $id)->update($data)) {
                    $message = 'Record has been updated successfully';
                    return redirect()->route('scorecardparams')->with('message', $message);
                } else {
                    $message = 'Recored failed to update';
                    return redirect()->route('scorecardparams')->with('fail', $message);
                };
            }
        } else {

            if (isset($id) && $id > 0 && $action == 2) {

                if (DB::table('tbl_parameters')->where('id', $id)->delete()) {
                    $message = 'Record has been deleted successfully';
                    return redirect()->route('scorecardparams')->with('message', $message);
                } else {
                    $message = 'Failed to delete record from database';
                    return redirect()->route('scorecardparams')->with('fail', $message);
                };
            } else {


                $edit = DB::table('tbl_parameters')
                        ->join('tbl_scorecard_categories', 'tbl_scorecard_categories.id', '=', 'tbl_parameters.category_id')
                        ->select('tbl_parameters.*', 'tbl_scorecard_categories.id as category_id', 'tbl_scorecard_categories.name as categoryname')
                        ->where('tbl_parameters.id', $id)
                        ->first();

                return view('forms.editscorecardparams', ['scorecardparams' => $edit]);
            }
        }
    }

//</editor-fold>
//<editor-fold defaultstate="collapsed" desc="systemparams">
    public function systemparams() {
        /**
         * Display a list of the score cards params in a grid.
         */
        $systemparams = DB::table('tbl_system_parameters')
                ->get();

        return view('grids.systemparams', ['systemparams' => $systemparams]);
    }

//</editor-fold>
//<editor-fold defaultstate="collapsed" desc="uploadparams">
    public function uploadparams() {

        if (Request::isMethod('post')) {
           
            $category_id = explode('-', Request::input('categoryname'));
            $files = json_decode(file_get_contents(url('/assets/js/vendor/file-upload/server/php/')), true);
            foreach ($files as $key => $story) {
                if (is_array($story)) {
                    foreach ($story as $subkey => $subvalue) {
                        if (is_array($subvalue)) {
                            foreach ($subvalue as $key => $subsubvalue) {
                                $filename = $subvalue['url'];
                                $file = $subvalue['url'];
                                $file = fopen($file, "r");
                                $i = 0;
                                while (!feof($file)) {
                                    $value = (fgetcsv($file, 0, ','));
                                    if ($i > 0) {
                                        if ($value[0] != '') {
                                            $inserts[] = "('" .trim($category_id[0]). "','"
                                                    . $value[0] . "','"
                                                    . $value["1"] . "','"
                                                    . 'INACTIVE' . "','"
                                                    . Carbon::now()->format('Y-m-d H:i:s') . "','"
                                                    . Carbon::now()->format('Y-m-d H:i:s') . "')";
                                        }
                                    } elseif ($i == 0) {
                                        $fields = $value;
                                    }
                                    $i++;
                                }
                                //dd(implode(",", $inserts));
                                DB::insert("INSERT INTO tbl_parameters (category_id,parametername,paramtype_bool,status,created_at,updated_at) VALUES " . implode(",", $inserts));
                                fclose($file);
                                return redirect()->route('uploadparams')->with('message', 'file uploaded successfully');
                            }
                        } else {           
                        }
                    }
                } else {
                    
                }
            }
        } else {
            $params = DB::table('tbl_scorecard_categories')
                    ->get();
            return view('forms.uploadparams', ['params' => $params]);
        }
    }

//</editor-fold>
//<editor-fold defaultstate="collapsed" desc="users">
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

//</editor-fold>
}
