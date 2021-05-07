<?php

namespace App\Http\Controllers;

use App\Unit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UnitController extends Controller
{
    public function index()
    {
    	$units = Unit::orderBy('id','desc')->get();

    	return view('units', compact('units'));
    }

    public function create(Request $request)
    {
    	$name = $request->name;
    	$ppw = $request->ppw;

    	$checkUnit = Unit::where('name',$name)->count();

    	if ($checkUnit > 0) {
    		return redirect()->back()->with('danger', 'Unit already Exists');
    	}

    	$create = Unit::create([
    		'name' => $name,
    		'periods_per_week' => $ppw,
    	]);

    	if ($create) {
    		return redirect()->back()->with('success', 'Unit Added');
    	}

    	return redirect()->back()->with('danger', 'Unit Not Added');
    	
    }

    public function edit(Request $request)
    { 
    	$id = $request->id;
		$findUnit = Unit::find($id);
		if($findUnit){
			$findUnit->name = $request->name;
			$findUnit->periods_per_week = $request->ppw;
			$findUnit->save();
		return redirect()->back()->with('success', '1 Unit edited');
		}
		return redirect()->back()->with('danger', 'Unit does not Exists');
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

