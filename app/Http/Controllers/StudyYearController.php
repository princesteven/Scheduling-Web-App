<?php

namespace App\Http\Controllers;

use App\StudyYear;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudyYearController extends Controller
{
    public function index()
    {
    	$study_years = StudyYear::get();

    	return view('study_years', compact('study_years'));
    }

    public function create(Request $request)
    {
    	$name = $request->name;

    	$checkStudyYear = StudyYear::where('year',$name)->count();

    	if ($checkStudyYear > 0) {
    		return redirect()->back()->with('danger', 'StudyYear already Exists');
    	}

    	$create = StudyYear::create([
    		'year' => $name,
    	]);

    	if ($create) {
    		return redirect()->back()->with('success', 'StudyYear Added');
    	}

    	return redirect()->back()->with('danger', 'StudyYear Not Added');
    	
    }

    public function edit(Request $request)
    { 
    	$id = $request->id;
		$findStudyYear = StudyYear::find($id);
		if($findStudyYear){
			$findStudyYear->year = $request->name;
			$findStudyYear->save();
		return redirect()->back()->with('success', '1 StudyYear edited');
		}
		return redirect()->back()->with('danger', 'StudyYear does not Exists');
	}

	public function delete(Request $request){
		$items_to_delete = (string)$request->delete[0];
		
        if($items_to_delete){
            $items_to_delete = explode(",",$items_to_delete);
            Unit::destroy($items_to_delete);
            return redirect()->back()->with('success', 'Unit(s) deleted');
        }
        
		return redirect()->back()->with('danger', 'Oop! an error occured,please try again');
		
	}
}
