<?php

namespace App\Http\Controllers;

use App\Unit;
use App\Course;
use App\Subject;
use App\Semester;
use App\StudyLevel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SubjectController extends Controller
{
    public function index()
    {
    	$subjects = Subject::orderBy('subjects.id','desc')
                        ->join('courses', 'courses.id', 'subjects.course_id')
                        ->join('semesters', 'semesters.id', 'subjects.semester_id')
						->join('study_levels', 'study_levels.id', 'subjects.study_level_id')
						 ->join('units', 'units.id', 'subjects.unit_id')
    					->select('subjects.id as s_id','subjects.name as s_name','subjects.code as s_code','subjects.unit_id as unit_id', 'courses.name as c_name','courses.id as c_id','semesters.name as semister','semesters.id as semister_id', 'study_levels.name as level','study_levels.id as level_id','units.name as unit_name')
    					->get();
        $levels = StudyLevel::get();
        $courses = Course::get();
		$semisters= Semester::get();
		$units= Unit::get();

    	return view('subjects', compact('subjects', 'levels','semisters','courses','units'));
    }

    public function create(Request $request)
    {
        $code = $request->code;
        $name = $request->name;
		$course= $request->course;
		$unit= $request->unit;
		$semester = $request->semester;
		$level= $request->level;

    	$checkSubject = Subject::where('name',$name)->count();

    	if ($checkSubject > 0) {
    		return redirect()->back()->with('danger', 'Subject already Exists');
    	}
    
    	$create = Subject::create([
			'name' => $name,
			'code' => $code,
			'unit_id' => $unit,
			'course_id' => $course,
			'semester_id' => $semester,
    		'study_level_id' => $level,
    	]);

    	if ($create) {
    		return redirect()->back()->with('success', 'Subject Added');
    	}

    	return redirect()->back()->with('danger', 'Subject Not Added');
    	
    }

    public function edit(Request $request)
    {   
    	$id = $request->id;
		$findSubject = Subject::find($id);
		if($findSubject){
			$findSubject->name = $request->name;
			$findSubject->code= $request->code;
			$findSubject->unit_id = $request->unit;
			$findSubject->course_id = $request->course;
			$findSubject->semester_id= $request->semester;
			$findSubject->study_level_id = $request->level;
			$findSubject->save();
		return redirect()->back()->with('success', '1 Subject edited');
		}
		return redirect()->back()->with('danger', 'Subject does not Exists');
	}

	public function delete(Request $request){
		$items_to_delete = (string)$request->delete[0];
        if($items_to_delete){
            $items_to_delete = explode(",",$items_to_delete);
            Subject::destroy($items_to_delete);
            return redirect()->back()->with('success', 'Subject(s) deleted');
        }
        
		return redirect()->back()->with('danger', 'Oop! an error occured,please try again');
		
	}
}
