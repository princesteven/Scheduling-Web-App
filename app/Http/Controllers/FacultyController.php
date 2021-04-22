<?php

namespace App\Http\Controllers;

use App\User;
use App\Rank;
use App\Category;
use App\Department;
use App\Venue;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class FacultyController extends Controller
{
    public function index()
    {
    	$faculties = User::getFaculties()->orderBy('id','desc')->get();
    	$studentPopulation = User::studentPopulation('Computer','NTA 4');
    	$ranks = Rank::get();
    	$categories = Category::get();
    	$departments = Department::get();

    	return view('faculties', compact('faculties', 'departments','ranks', 'categories'));
    }

    public function create(Request $request)
    {
    	$name = $request->name;
    	$regno = $request->regno;
    	$email = $request->email;
    	$mobile = $request->mobile;
    	$gender = $request->gender;
    	$rank = $request->rank;
    	$category = $request->category;
    	$privilage = $request->privilage;
    	$department = $request->department;

    	$checkUser = User::where('name',$name)->count();

    	if ($checkUser > 0) {
    		return redirect()->back()->with('danger', 'Faculty already Exists');
    	}

    	$create = User::create([
    		'regno' => $regno,
    		'name' => $name,
    		'email' => $email,
    		'mobile' => $mobile,
    		'gender' => $gender,
    		'rank_id' => $rank,
    		'privilage' => $privilage,
    		'category_id' => $category,
    		'dpt_id' => $department,
    		'password' => Hash::make('password')
    	]);

    	if ($create) {
    		return redirect()->back()->with('success', 'Faculty Added');
    	}

    	return redirect()->back()->with('danger', 'Faculty Not Added');
    	
    }

    public function edit(Request $request)
    { 
    	$id = $request->id;
		$findCourse = User::find($id);
		if($findCourse){
			$findCourse->regno = $request->regno;
			$findCourse->name= $request->name;
			$findCourse->email = $request->email;
			$findCourse->mobile = $request->mobile;
			$findCourse->gender = $request->gender;
			$findCourse->rank_id = $request->rank;
			$findCourse->privilage = $request->privilage;
			$findCourse->category_id = $request->category;
			$findCourse->dpt_id = $request->department;
			$findCourse->save();
		return redirect()->back()->with('success', '1 Faculty edited');
		}
		return redirect()->back()->with('danger', 'Faculty does not Exists');
	}

	public function delete(Request $request){
		$items_to_delete = (string)$request->delete[0];
		
        if($items_to_delete){
            $items_to_delete = explode(",",$items_to_delete);
            User::destroy($items_to_delete);
            return redirect()->back()->with('success', 'Faculty(s) deleted');
        }
        
		return redirect()->back()->with('danger', 'Oop! an error occured,please try again');
		
	}
}
