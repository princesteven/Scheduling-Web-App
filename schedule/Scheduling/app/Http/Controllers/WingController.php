<?php

namespace App\Http\Controllers;

use App\Unit;
use App\Wing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WingController extends Controller
{
    public function index()
    {
    	$wings = Wing::orderBy('id','desc')->get();

    	return view('wings', compact('wings'));
    }

    public function create(Request $request)
    {
    	$name = $request->name;

    	$checkWing = Wing::where('name',$name)->count();

    	if ($checkWing > 0) {
    		return redirect()->back()->with('danger', 'Wing already Exists');
    	}

    	$create = Wing::create([
    		'name' => $name,
    	]);

    	if ($create) {
    		return redirect()->back()->with('success', 'Wing Added');
    	}

    	return redirect()->back()->with('danger', 'Wing Not Added');

    }

    public function edit(Request $request)
    {
    	$id = $request->id;
		$findWing = Wing::find($id);
		if($findWing){
			$findWing->name = $request->name;
			$findWing->save();
		return redirect()->back()->with('success', '1 Wing edited');
		}
		return redirect()->back()->with('danger', 'Wing does not Exists');
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
