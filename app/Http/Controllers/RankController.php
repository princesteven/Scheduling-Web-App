<?php

namespace App\Http\Controllers;

use App\Rank;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RankController extends Controller
{
    public function index()
    {
    	$ranks = Rank::get();

    	return view('ranks', compact('ranks'));
    }

    public function create(Request $request)
    {
    	$name = $request->name;

    	$checkRank = Rank::where('name',$name)->count();

    	if ($checkRank > 0) {
    		return redirect()->back()->with('danger', 'Rank already Exists');
    	}

    	$create = Rank::create([
    		'name' => $name,
    	]);

    	if ($create) {
    		return redirect()->back()->with('success', 'Rank Added');
    	}

    	return redirect()->back()->with('danger', 'Rank Not Added');
    	
    }

    public function edit(Request $request)
    { 
    	$id = $request->id;
		$findRank = Rank::find($id);
		if($findRank){
			$findRank->name = $request->name;
			$findRank->save();
		return redirect()->back()->with('success', '1 Rank edited');
		}
		return redirect()->back()->with('danger', 'Rank does not Exists');
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
