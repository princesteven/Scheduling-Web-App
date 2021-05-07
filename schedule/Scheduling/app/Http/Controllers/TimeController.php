<?php

namespace App\Http\Controllers;

use App\Time;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TimeController extends Controller
{
    public function index()
    {
    	$times = Time::groupBy('start_time')->get();

    	return view('times', compact('times'));
    }

    public function create(Request $request)
    {
    	$start_time = $request->start_time;
    	$end_time = $request->end_time;
        $days = array('Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday');

    	$checkStartTime = Time::where('start_time',$start_time)
    					->count();

        $checkEndTime = Time::where('end_time',$end_time)
                        ->count();

    	if ($checkStartTime > 0) {
            return redirect()->back()->with('danger', 'Start Time already Exists');
        }


        if ($checkEndTime > 0) {
    		return redirect()->back()->with('danger', 'End Time already Exists');
    	}

        foreach (range(0, 4) as $day) {
        	$create = Time::create([
        		'start_time' => $start_time,
        		'end_time' => $end_time,
                'days' => $days[$day],
        	]);
        }

    	if ($create) {
    		return redirect()->back()->with('success', 'Time Added');
    	}

    	return redirect()->back()->with('danger', 'Time Not Added');
    	
    }

    public function edit(Request $request)
    { 
    	$id = $request->id;
		$findID = Time::find($id);
        $findTimes = Time::where('start_time', $findID->start_time)->get();

		if($findTimes){
            foreach ($findTimes as $findTime) {
    			$findTime->start_time = $request->start_time;
    			$findTime->end_time = $request->end_time;
    			$findTime->save();
            }
		return redirect()->back()->with('success', 'Time Slot edited');
		}
		return redirect()->back()->with('danger', 'Time Slot does not Exists');
	}

	public function delete(Request $request){
        $items_to_delete_id = (string)$request->delete[0];
        $find_id = Time::find($items_to_delete_id);
		$this_to_delete = Time::where('start_time', $find_id->start_time)->get();
        $items_to_delete = array();

        foreach ($this_to_delete as $delete) {
            array_push($items_to_delete, $delete->id);
        }

        $items_to_delete = implode(",", $items_to_delete);

        if($items_to_delete){
            $items_to_delete = explode(",",$items_to_delete);
            Time::destroy($items_to_delete);
            return redirect()->back()->with('success', 'Time slot(s) deleted');
        }
        
		return redirect()->back()->with('danger', 'Oop! an error occured,please try again');
		
	}
}
