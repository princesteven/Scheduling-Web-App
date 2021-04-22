<?php

namespace App\Http\Controllers;

use App\Course;
use App\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CourseController extends Controller
{
    public function index()
    {
    	$courses = Course::orderBy('courses.id','desc')
    					->join('departments', 'departments.id', 'courses.department_id')
    					->select('departments.name as d_name', 'departments.id as d_id', 'department_id', 'courses.name as c_name', 'departments.code as d_code', 'courses.code as c_code', 'courses.id as c_id')
    					->get();

    	$departments = Department::get();

    	return view('courses', compact('courses', 'departments'));
    }

    public function create(Request $request)
    {
    	$name = $request->name;
    	$code = $request->code;
    	$department = $request->department;

    	$checkCourse = Course::where('name',$name)->count();

    	if ($checkCourse > 0) {
    		return redirect()->back()->with('danger', 'Course already Exists');
    	}

    	$create = Course::create([
    		'name' => $name,
    		'code' => $code,
    		'department_id' => $department,
    	]);

    	if ($create) {
    		return redirect()->back()->with('success', 'Course Added');
    	}

    	return redirect()->back()->with('danger', 'Course Not Added');
    	
    }

    public function edit(Request $request)
    { 
    	$id = $request->id;
		$findCourse = Course::find($id);
		if($findCourse){
			$findCourse->name = $request->name;
			$findCourse->code= $request->code;
			$findCourse->department_id = $request->department;
			$findCourse->save();
		return redirect()->back()->with('success', '1 Course edited');
		}
		return redirect()->back()->with('danger', 'Course does not Exists');
	}

	public function delete(Request $request){
		$items_to_delete = (string)$request->delete[0];
		
        if($items_to_delete){
            $items_to_delete = explode(",",$items_to_delete);
            Course::destroy($items_to_delete);
            return redirect()->back()->with('success', 'Course(s) deleted');
        }
        
		return redirect()->back()->with('danger', 'Oop! an error occured,please try again');
		
	}
}
