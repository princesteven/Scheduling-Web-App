<?php

namespace App\Http\Controllers;

use App\Day;
use App\Unit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DayController extends Controller
{
    public function index()
    {
    	$days = Day::get();

    	return view('days', compact('days'));
    }

    public function create(Request $request)
    {
    	$name = $request->name;

    	$checkDay = Day::where('day',$name)->count();

    	if ($checkDay > 0) {
    		return redirect()->back()->with('danger', 'Day already Exists');
    	}

    	$create = Day::create([
    		'day' => $name,
    	]);

    	if ($create) {
    		return redirect()->back()->with('success', 'Day Added');
    	}

    	return redirect()->back()->with('danger', 'Day Not Added');

    }

    public function edit(Request $request)
    {
    	$id = $request->id;
		$findDay = Day::find($id);
		if($findDay){
			$findDay->day = $request->name;
			$findDay->save();
		return redirect()->back()->with('success', '1 Day edited');
		}
		return redirect()->back()->with('danger', 'Day does not Exists');
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
