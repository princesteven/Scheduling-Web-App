<?php

namespace App\Http\Controllers;

use App\Venue;
use App\Wing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VenueController extends Controller
{
    public function index()
    {
    	$venues = Venue::orderBy('venues.id','desc')
    					->join('wings', 'wings.id', 'venues.wing_id')
    					->select('wings.name as w_name', 'wings.id as w_id', 'wing_id', 'venues.name as v_name', 'capacity', 'venues.id as v_id', 'wings.id as w_id')
    					->get();

    	$wings = Wing::get();

    	return view('venues', compact('venues', 'wings'));
    }

    public function create(Request $request)
    {
    	$name = $request->name;
    	$capacity = $request->capacity;
    	$wing = $request->wing;

    	$checkVenue = Venue::where('name',$name)->count();

    	if ($checkVenue > 0) {
    		return redirect()->back()->with('danger', 'Venue already Exists');
    	}

    	$create = Venue::create([
    		'name' => $name,
    		'capacity' => $capacity,
    		'wing_id' => $wing,
    	]);

    	if ($create) {
    		return redirect()->back()->with('success', 'Venue Added');
    	}

    	return redirect()->back()->with('danger', 'Venue Not Added');
    	
    }

    public function edit(Request $request)
    { 
    	$id = $request->id;
		$findVenue = Venue::find($id);
		if($findVenue){
			$findVenue->name = $request->name;
			$findVenue->capacity= $request->capacity;
			$findVenue->wing_id = $request->wing;
			$findVenue->save();
		return redirect()->back()->with('success', '1 Venue edited');
		}
		return redirect()->back()->with('danger', 'Venue does not Exists');
	}

	public function delete(Request $request){
		$items_to_delete = (string)$request->delete[0];
		
        if($items_to_delete){
            $items_to_delete = explode(",",$items_to_delete);
            Venue::destroy($items_to_delete);
            return redirect()->back()->with('success', 'Venue(s) deleted');
        }
        
		return redirect()->back()->with('danger', 'Oop! an error occured,please try again');
		
	}
}
