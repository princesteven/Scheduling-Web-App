<?php

namespace App\Http\Controllers;

use App\User;
use App\Department;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DepartmentController extends Controller
{
    public function index()
    {
    	$departments = DB::table('departments')
    					->leftJoin('users', 'users.id', 'departments.user_id')
    					->select('users.*', 'departments.id as d_id', 'departments.name as d_name', 'departments.code as d_code','users.id as user_id')
    					->get();

    	$users = User::where('privilage','HoD')->get();

    	return view('departments', compact('departments', 'users'));
    }

    public function create(Request $request)
    {
    	$name = $request->name;
    	$code = $request->code;
    	$hod = $request->hod;

    	$checkDepartment = Department::where('name',$name)->count();

    	if ($checkDepartment > 0) {
    		return redirect()->back()->with('danger', 'Department already Exists');
    	}

    	$create = Department::create([
    		'name' => $name,
    		'code' => $code,
    		'user_id' => $hod,
    	]);
			//update privilage to hod
    	if ($create) {
    		return redirect()->back()->with('success', 'Department Added');
    	}

    	return redirect()->back()->with('danger', 'Department Not Added');
    	
    }

    public function edit(Request $request)
    { 
    	$id = $request->id;
		$findDepartment = Department::find($id);
		// update privilage to hod
		if($findDepartment){
			$findDepartment->name = $request->name;
			$findDepartment->code= $request->code;
			$findDepartment->user_id = $request->hod;
			$findDepartment->save();
		return redirect()->back()->with('success', '1 Department edited');
		}
		return redirect()->back()->with('danger', 'Department does not Exists');
	}

	public function delete(Request $request){
		//remove user from hod
		$items_to_delete = (string)$request->delete[0];
		
        if($items_to_delete){
            $items_to_delete = explode(",",$items_to_delete);
            Department::destroy($items_to_delete);
            return redirect()->back()->with('success', 'Department(s) deleted');
        }
        
		return redirect()->back()->with('danger', 'Oop! an error occured,please try again');
		
	}
}
