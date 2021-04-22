<?php

namespace App\Http\Controllers;

use App\Semester;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SemesterController extends Controller
{
    public function index()
    {
    	$semesters = Semester::get();

    	return view('semesters', compact('semesters'));
    }

    public function create(Request $request)
    {
    	$name = $request->name;

    	$checkSemester = Semester::where('name',$name)->count();

    	if ($checkSemester > 0) {
    		return redirect()->back()->with('danger', 'Semester already Exists');
    	}

    	$create = Semester::create([
    		'name' => $name,
    	]);

    	if ($create) {
    		return redirect()->back()->with('success', 'Semester Added');
    	}

    	return redirect()->back()->with('danger', 'Semester Not Added');
    	
    }

    public function edit(Request $request)
    { 
    	$id = $request->id;
		$findSemester = Semester::find($id);
		if($findSemester){
			$findSemester->name = $request->name;
			$findSemester->save();
		return redirect()->back()->with('success', '1 Semester edited');
		}
		return redirect()->back()->with('danger', 'Semester does not Exists');
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
