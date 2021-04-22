<?php

namespace App\Http\Controllers;

use App\StudyLevel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudyLevelController extends Controller
{
    public function index()
    {
    	$study_levels = StudyLevel::get();

    	return view('study_levels', compact('study_levels'));
    }

    public function create(Request $request)
    {
    	$name = $request->name;

    	$checkStudyLevel = StudyLevel::where('name',$name)->count();

    	if ($checkStudyLevel > 0) {
    		return redirect()->back()->with('danger', 'StudyLevel already Exists');
    	}

    	$create = StudyLevel::create([
    		'name' => $name,
    	]);

    	if ($create) {
    		return redirect()->back()->with('success', 'StudyLevel Added');
    	}

    	return redirect()->back()->with('danger', 'StudyLevel Not Added');
    	
    }

    public function edit(Request $request)
    { 
    	$id = $request->id;
		$findStudyLevel = StudyLevel::find($id);
		if($findStudyLevel){
			$findStudyLevel->name = $request->name;
			$findStudyLevel->save();
		return redirect()->back()->with('success', '1 StudyLevel edited');
		}
		return redirect()->back()->with('danger', 'StudyLevel does not Exists');
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
