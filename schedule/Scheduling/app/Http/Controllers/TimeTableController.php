<?php
namespace App\Http\Controllers;
use App\User;
use App\Time;
use App\Day;
use App\Venue;
use App\Course;
use App\Subject;
use App\Schedule;
use App\StudyLevel;
use App\Department;
use Carbon\Carbon;
use App\ChangeRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class TimeTableController extends Controller
{
	public function index()
	{
		$faculties = User::getFaculties()->get();
		$courses = Course::get();
		$subjects = Subject::get();
		$departments = Department::get();
		$study_levels = StudyLevel::get();
		$venues = Venue::get();

		return view('createTimetable', compact('faculties', 'courses', 'subjects', 'departments', 'study_levels', 'venues'));
	}

    public function create()
    {

    }

    public function edit(Request $request)
    {
      	$id = $request->id;
		$findSubject = Schedule::find($id);
		if($findSubject){
			$findSubject->user_id = $request->lecturer;
			$findSubject->subject_id = $request->subject;
			$findSubject->study_level_id = $request->study_level;
			$findSubject->department_id= $request->department;
			$findSubject->venue_id = $request->venue;
			$findSubject->save();
		return 200;
		}
		return 404;
    }

    public function delete(Request $request)
    {
       Schedule::destroy($request->id);
       return 200;

    }

    public function courses(Request $request)
    {
    	return Course::where('department_id', $request->departmentid)->get();
    }

    public function subjects(Request $request)
    {
    	return Subject::where('course_id', $request->courseid)
    					->where('study_level_id', $request->studylevelid)
    					->get();
    }

    public function returnsubjects()
    {
    	return 'okay';
    }

    public function timeTableItems(Request $request)
    {

    	$studentPopulation = User::studentPopulation($request->course, $request->study_level);

    	$selectVenue = Venue::where('capacity','>=',$studentPopulation)
    	   						->orderBy('capacity','asc')
    	   						->get();

    	/*Make sure that different subjects of the same course do not get allocated the same time*/
        $allocatedSubjects = Venue::validSubject() /*it was allocatedSubject()*/
                                    /*->where('subject_id',$request->subject)*/
                                    ->where('subjects.study_level_id',$request->study_level)
                                    ->where('subjects.course_id',$request->course)
     	   						    ->select('time_id')
     	   						    ->get();
        $allocatedLecturers = Venue::allocatedLecturers()
                                    ->where('user_id',$request->lecturer)
     	   						    ->select('time_id')
     	   						    ->get();
     	$checkVenues = Venue::usedVenues()
     	   						->where('venue_id',$request->venue)
     	   						->select('time_id')
     	   						->get();

     	$displayVenue = Venue::where('id',$request->venue)->get();


        $items = Time::orderBy('start_time', 'asc')->get();

        return array("items" => $items,
        	         "usedVenues"=> $checkVenues,
        	         "venue_name" => $displayVenue,
        	         "allocatedSubjects" => $allocatedSubjects,
        	         "allocatedLecturers" => $allocatedLecturers
        	        );

    }

    public function insertTimetable(Request $request)
    {
     	$selects = $request->selected;
     	$study_level = $request->study_level;
     	$lecturer = $request->lecturer;
     	$venue = $request->venue;
     	$subject = $request->subject;
        $department = $request->department;
     	$course = $request->course;

     	foreach ($selects as $selected) {
     		$timetable = Schedule::create([
     			'time_id' => $selected,
				'user_id' => $lecturer,
				'subject_id' => $subject,
				'year_semester_id' => 1,    //Rekebisha year_semester_id isiwe 1 tu
				'study_level_id' => $study_level,
				'department_id' => $department,
                'venue_id' => $venue,
				'course_id' => $course,
     		]);
     	}

     	if ($timetable) {
     		return 'ok';
     	}
    }

    public function viewTimetable(Request $request)
    {
		// $now = Carbon::now()->subHours(16)->addMinutes(34);

		// $now_time = $now->format("H:i");
		// $inTenMinutes = $now->addMinutes(10)
        //                              ->format("H:i");
		// return Schedule::rightJoin('times','times.id','schedules.time_id')
		// ->rightJoin('subjects','subjects.id','schedules.subject_id')
		// ->rightJoin("venues","venues.id","schedules.venue_id")
		// ->select('start_time','end_time','department_id','schedules.study_level_id','schedules.course_id',"subjects.name as subject_name","venues.name as venue_name", "schedules.status")
		// ->where('schedules.status', null)
		// ->where('start_time', '>', $now_time)
		// ->where('start_time', $inTenMinutes)
		// ->where('days','monday') //$current_day
		// ->get();
		// $current_day = date('l', strtotime('two days ago'));
		// return $current_day;


     	$schedules = Schedule::rightJoin('times', function($join){
					     		$join->on('times.id', 'time_id')
					     			 ->where('schedules.study_level_id', Auth::User()->study_level_id)
                                     ->where('schedules.course_id', Auth::User()->course_id);
					     	})
     						->leftJoin('users', 'users.id', 'user_id')
     						->leftJoin('subjects', 'subjects.id', 'subject_id')
     						->leftJoin('study_levels', 'study_levels.id', 'schedules.study_level_id')
     						->leftJoin('venues', 'venues.id', 'venue_id')
							->leftJoin('departments', 'departments.id', 'department_id')
     						->select('schedules.id', 'times.start_time', 'times.end_time', 'times.days', 'users.name as user_name', 'subjects.name as subject_name', 'subjects.code as subject_code', 'study_levels.name as study_level_name', 'venues.name as venue_name', 'departments.name as department_name', 'schedules.status')
     						->orderBy('start_time', 'asc')
     						->orderByRaw(DB::raw("FIELD(days, 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday')"))
     						->get();

     	$facultySchedules = Schedule::rightJoin('times', 'times.id', 'time_id')
     						->leftJoin('users', function($join){
					     		$join->on('users.id', 'schedules.user_id')
					     			 ->where('schedules.user_id', Auth::id());
					     	})
     						->leftJoin('subjects', 'subjects.id', 'subject_id')
     						->leftJoin('study_levels', 'study_levels.id', 'schedules.study_level_id')
     						->leftJoin('venues', 'venues.id', 'venue_id')
     						->leftJoin('departments', 'departments.id', 'department_id')
     						/*->where('schedules.user_id', Auth::id())*/
     						/*->whereRaw('users.name IS NOT null AND subjects.name IS NOT null')
     						->orWhereRaw('users.name IS null AND subjects.name IS null')*/
     						->select('times.start_time', 'times.end_time', 'times.days', 'users.name as user_name', 'subjects.name as subject_name', 'subjects.code as subject_code', 'study_levels.name as study_level_name', 'venues.name as venue_name', 'departments.name as department_name','schedules.status')
     						->orderBy('start_time', 'asc')
     						->orderByRaw(DB::raw("FIELD(days, 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday')"))
     						->get();

     	$mon = $schedules->whereStrict('days', 'Monday')->flatten();

     	$tue = $schedules->whereStrict('days', 'Tuesday')->flatten();

     	$wed = $schedules->whereStrict('days', 'Wednesday')->flatten();

     	$thu = $schedules->whereStrict('days', 'Thursday')->flatten();

     	$fri = $schedules->whereStrict('days', 'Friday')->flatten();

     	$fmon = $facultySchedules->whereStrict('days', 'Monday')->flatten();

     	$ftue = $facultySchedules->whereStrict('days', 'Tuesday')->flatten();

     	$fwed = $facultySchedules->whereStrict('days', 'Wednesday')->flatten();

     	$fthu = $facultySchedules->whereStrict('days', 'Thursday')->flatten();

     	$ffri = $facultySchedules->whereStrict('days', 'Friday')->flatten();

     	$indices = array();
     	$findices = array();

		foreach (range(0, count($mon) - 1) as $index) {
			$indices[$index] = array(
									'monday' => $mon[$index],
									'tuesday' => $tue[$index],
									'wednesday' => $wed[$index],
									'thursday' => $thu[$index],
									'friday' => $fri[$index]
								);
		}

		foreach (range(0, count($mon) - 1) as $index) {
			$findices[$index] = array(
									'monday' => $mon[$index],
									'tuesday' => $tue[$index],
									'wednesday' => $wed[$index],
									'thursday' => $thu[$index],
									'friday' => $fri[$index]
								);
		}
		$level = StudyLevel::find(Auth::user()->study_level_id);
		$user = Auth::user()->name;
		$times = Time::select('start_time', 'end_time')->distinct('start_time')->get();
		$venues = DB::table('venues')->select('name');
		$subjects = DB::table('subjects')->select('name');
		$typeahead = DB::table('users')->where('category_id', '2')->select('name')->union($subjects)->union($venues)->get();
		$autocomplete = array();

		foreach ($typeahead as $venue) {
			array_push($autocomplete, $venue->name);
		}

		$autocomplete = '"'.implode('","', $autocomplete).'"';

     	return view('viewTimetable', compact('indices', 'findices', 'mon', 'tue', 'wed', 'thu', 'fri', 'times', 'fmon', 'ftue', 'fwed', 'fthu', 'ffri', 'level', 'user', 'autocomplete'));
    }

    public function printTimetable(Request $request)
    {

     	$schedules = Schedule::rightJoin('times', function($join){
					     		$join->on('times.id', 'time_id')
					     			 ->where('schedules.study_level_id', Auth::User()->study_level_id);
					     	})
     						->leftJoin('users', 'users.id', 'user_id')
     						->leftJoin('subjects', 'subjects.id', 'subject_id')
     						->leftJoin('study_levels', 'study_levels.id', 'schedules.study_level_id')
     						->leftJoin('venues', 'venues.id', 'venue_id')
     						->leftJoin('departments', 'departments.id', 'department_id')
     						->select('times.start_time', 'times.end_time', 'times.days', 'users.name as user_name', 'subjects.name as subject_name', 'subjects.code as subject_code', 'study_levels.name as study_level_name', 'venues.name as venue_name', 'departments.name as department_name')
     						->orderBy('start_time', 'asc')
     						->orderByRaw(DB::raw("FIELD(days, 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday')"))
     						->get();

     	$mon = $schedules->whereStrict('days', 'Monday')->flatten();

     	$tue = $schedules->whereStrict('days', 'Tuesday')->flatten();

     	$wed = $schedules->whereStrict('days', 'Wednesday')->flatten();

     	$thu = $schedules->whereStrict('days', 'Thursday')->flatten();

     	$fri = $schedules->whereStrict('days', 'Friday')->flatten();

     	$indices = array();

		foreach (range(0, count($mon) - 1) as $index) {
			$indices[$index] = array(
									'monday' => $mon[$index],
									'tuesday' => $tue[$index],
									'wednesday' => $wed[$index],
									'thursday' => $thu[$index],
									'friday' => $fri[$index]
								);
		}

     	return view('printTimetable', compact('indices', 'mon', 'tue', 'wed', 'thu', 'fri'));
    }

    public function searchResults(Request $request)
    {
        $searchItem = $request->q;
        $searchResults = Schedule::rightJoin('times', 'times.id', 'time_id')
                            ->leftJoin('users', 'users.id', 'schedules.user_id')
                            ->leftJoin('subjects', 'subjects.id', 'subject_id')
                            ->leftJoin('study_levels', 'study_levels.id', 'schedules.study_level_id')
                            ->leftJoin('venues', 'venues.id', 'venue_id')
                            ->leftJoin('departments', 'departments.id', 'department_id')
                            ->select('times.start_time', 'times.end_time', 'times.days', 'users.name as user_name', 'subjects.name as subject_name', 'subjects.code as subject_code', 'study_levels.name as study_level_name', 'venues.name as venue_name', 'departments.name as department_name')
                            ->orderBy('start_time', 'asc')
                            ->orderByRaw(DB::raw("FIELD(days, 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday')"))
                            ->where('users.name', $searchItem)
                            ->orwhere('subjects.name', $searchItem)
                            ->orwhere('venues.name', $searchItem)
                            ->get();

        $mon = $searchResults->whereStrict('days', 'Monday')->flatten();

        $tue = $searchResults->whereStrict('days', 'Tuesday')->flatten();

        $wed = $searchResults->whereStrict('days', 'Wednesday')->flatten();

        $thu = $searchResults->whereStrict('days', 'Thursday')->flatten();

        $fri = $searchResults->whereStrict('days', 'Friday')->flatten();

            return view('searchResults', compact('searchResults', 'searchItem', 'mon', 'tue', 'wed', 'thu', 'fri'));
    }

    /*Methods to request change in timetable*/
    /*View for  placing the request*/
    public function requestChange()
    {
        return view('');
    }

    /*Placing the change request*/
    public function submitChangeRequest(Request $request)
    {
		$changes= $request->schedule;
		foreach($changes as $change){
			$scheduleID = $change["schedule_id"];
			$start_time = $change["start_time"];
			$end_time = $change["end_time"];
			$venue = $change["venue"];
			$day = $change["day"];
			$venue_id = Venue:: where('name', $venue)->select('id')->first();
			$time = Time::where("days",$day)
						   ->where("start_time",$start_time)
						   ->where("end_time",$end_time)
						   ->first();
			$proposed_schedule = ChangeRequest::where('schedule_id', $scheduleID)
			                                ->where('status', 'pending')
			                                ->count();
			if ($proposed_schedule == 0) {
				$schedule = Schedule::where('id',$scheduleID)->first();
				$proposed_schedule = Schedule::create([
					'time_id' => $time->id,
					'user_id' => $schedule->user_id,
					'subject_id' => $schedule->subject_id,
					'year_semester_id' => 1,    //Rekebisha year_semester_id isiwe 1 tu
					'study_level_id' => $schedule->study_level_id,
					'department_id' => $schedule->department_id,
					'venue_id' => $venue_id->id,
					'course_id' => $schedule->course_id,
					'status' => 'pending'
				]);
				$placeRequest = ChangeRequest::create([
					'schedule_id' => $scheduleID,
					'proposed_schedule_id' => $proposed_schedule->id,
					'status' => 'pending',
				]);
			 return "Success";
			}
		  return "Failed";
        }

    }

    /*Examination Officer sees the requests*/
    public function viewChangeRequests()
    {
		$changes = Schedule::leftJoin('users', 'users.id', 'schedules.user_id')
							->leftJoin('venues', 'venues.id', 'schedules.venue_id')
							->leftJoin('subjects', 'subjects.id', 'schedules.subject_id')
							->leftJoin('times', 'times.id', 'schedules.time_id')
							->leftJoin('courses', 'courses.id', 'schedules.course_id')
							->leftJoin('study_levels', 'study_levels.id', 'schedules.study_level_id')
							->rightJoin('change_requests', 'schedule_id', 'schedules.id')
							->leftJoin('schedules as proposed_schedule', 'proposed_schedule.id', 'proposed_schedule_id')
							->leftJoin('users as proposed_user', 'proposed_user.id', 'proposed_schedule.user_id')
							->leftJoin('subjects as proposed_subject', 'proposed_subject.id', 'proposed_schedule.subject_id')
							->leftJoin('venues as proposed_venue', 'proposed_venue.id', 'proposed_schedule.venue_id')
							->leftJoin('times as proposed_time', 'proposed_time.id', 'proposed_schedule.time_id')
							->leftJoin('courses as proposed_course', 'proposed_course.id', 'proposed_schedule.course_id')
							->leftJoin('study_levels as proposed_study_level', 'proposed_study_level.id', 'proposed_schedule.study_level_id')
							->select('schedules.id as schedule_id', 'times.start_time as schedule_start_time', 'times.end_time as schedule_end_time', 'times.days as schedule_day', 'users.name as schedule_lecture', 'subjects.name as schedule_subject', 'venues.name as schedule_venue', 'courses.name as schedule_course', 'study_levels.name as schedule_level', 'proposed_schedule.id as proposed_schedule_id', 'proposed_time.start_time as proposed_schedule_start_time', 'proposed_time.end_time as proposed_schedule_end_time', 'proposed_time.days as proposed_schedule_day', 'proposed_user.name as proposed_schedule_lecture', 'proposed_subject.name as proposed_schedule_subject', 'proposed_venue.name as proposed_schedule_venue', 'proposed_course.name as proposed_schedule_course', 'proposed_study_level.name as proposed_schedule_level')
							->get();

        return view('changeRequests', compact('changes'));
    }
    /*Get Schedule by lecture id*/
	public function scheduleByLecture(Request $request)

    {
		$user_id = $request->lecture;
		 $schedule = Schedule::rightJoin('times', 'times.id', 'time_id')
                            ->leftJoin('users', 'users.id', 'schedules.user_id')
							->leftJoin('subjects', 'subjects.id', 'subject_id')
							->leftJoin('venues', 'venues.id', 'venue_id')
							->where('users.id', $user_id)
							->where('status', null)
							->select('schedules.id as schedule_id','subjects.id as subject_id','subjects.name as subject_name','times.id as time_id','times.start_time as start_time','times.end_time as end_time',"times.days as day","venues.id as venue_id","venues.name as venue_name")
							->get();

		$venues = Venue::get();
		$times = Time::get();
	    return array("schedule" => $schedule,"venues" => $venues,"times" => $times);

    }

    /*Examination Officer accepts request*/
    public function acceptChangeRequest(Request $request)
    {
        $proposed_schedule_id = $request->proposed_schedule_id;
        $schedule_id = $request->schedule_id;

        $requests = ChangeRequest:: where('schedule_id', $schedule_id)
                            ->first();

        $requests->delete();

        $schedule = Schedule::find($schedule_id);

        $schedule->delete();

        $proposed_schedule = Schedule::find($proposed_schedule_id);
        $proposed_schedule->status = null;
        $proposed_schedule->save();

        return redirect()->back()->with('success', 'Request Accepted');
    }

    /*Examination Officer declines request*/
    public function denyChangeRequest(Request $request)
    {
        $proposed_schedule_id = $request->proposed_schedule_id;
        $schedule_id = $request->schedule_id;

        $requests = ChangeRequest:: where('proposed_schedule_id', $proposed_schedule_id)
                            ->first();

        $requests->delete();

        $proposed_schedule = Schedule::find($proposed_schedule_id);

        $proposed_schedule->delete();

        return redirect()->back()->with('success', 'Request Denied');
	}

	public function filterVenues(Request $request){
		$start_time = $request->start_time;
		$end_time = $request->end_time;
		$day = $request->day;
		return Venue::leftJoin('schedules', 'venues.id', 'schedules.id')
                	->leftJoin ('times', function($join) use($start_time, $end_time, $day) {
		                  $join->on('times.id', 'schedules.time_id')
		                       ->where('start_time', $start_time)
                               ->where('end_time', $end_time)
		                       ->where('days', $day);
	             	})
	                ->select('venues.name', 'times.start_time', 'times.end_time', 'times.days')
					->get();

	}
	public function form()
	{
		$faculties = User::getFaculties()->get();
		$courses = Course::get();
		$subjects = Subject::get();
		$departments = Department::get();
		$study_levels = StudyLevel::get();
		$venues = Venue::get();

		 return array("faculties" => $faculties,
        	         "courses"=> $courses,
        	         "subjects" => $subjects,
        	         "levels" => $study_levels,
        	         "venues" => $venues,
        	         "departments" => $departments,
        	        );
	}
	public function preview(Request $request)
	{   $venue = $request->venue;
		$venueSchedule = Schedule::rightJoin('times', function($join)use($venue){
					     		$join->on('times.id', 'time_id')
					     			 ->where('schedules.venue_id',$venue);
					     	})
     						->leftJoin('users', 'users.id', 'user_id')
     						->leftJoin('subjects', 'subjects.id', 'subject_id')
     						->leftJoin('courses', 'subjects.course_id', 'courses.id')
     						->leftJoin('study_levels', 'study_levels.id', 'schedules.study_level_id')
     						->leftJoin('venues', 'venues.id', 'venue_id')
     						->leftJoin('departments', 'departments.id', 'schedules.department_id')
     						->select('schedules.id','times.start_time', 'times.end_time', 'times.days', 'users.name as user_name','users.id as lecturer', 'subjects.name as subject_name','subjects.id as subject', 'subjects.code as subject_code', 'study_levels.name as study_level_name','study_levels.id as study_level', 'venues.name as venue_name','venues.id as venue', 'departments.name as department_name','departments.id as department','courses.id as course','courses.name as course_name')
     						->orderBy('start_time', 'asc')
     						->orderByRaw(DB::raw("FIELD(days, 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday')"))
							 ->get();
		return $venueSchedule;
	}

	public function masterTimetable(Request $request)
	{
		$venues = Venue::orderBy('id', 'asc')->get();
		$times = Time::select('start_time', 'end_time')->distinct('start_time')->get();
		$monday = $this->mainTimetable()->whereStrict('days', 'Monday')->flatten();
		$tuesday = $this->mainTimetable()->whereStrict('days', 'Tuesday')->flatten();
		$wednesday = $this->mainTimetable()->whereStrict('days', 'Wednesday')->flatten();
		$thursday = $this->mainTimetable()->whereStrict('days', 'Thursday')->flatten();
		$friday = $this->mainTimetable()->whereStrict('days', 'Friday')->flatten();
		return view('mastertimetable', compact('venues', 'times', 'monday', 'tuesday', 'wednesday', 'thursday', 'friday'));
	}

	public function departmentTimetable()
	{
		$venues = Venue::orderBy('id', 'asc')->get();
		$times = Time::select('start_time', 'end_time')->distinct('start_time')->get();
		$monday = $this->dptTimetable()->whereStrict('days', 'Monday')->flatten();
		$tuesday = $this->dptTimetable()->whereStrict('days', 'Tuesday')->flatten();
		$wednesday = $this->dptTimetable()->whereStrict('days', 'Wednesday')->flatten();
		$thursday = $this->dptTimetable()->whereStrict('days', 'Thursday')->flatten();
		$friday = $this->dptTimetable()->whereStrict('days', 'Friday')->flatten();
		$department = Department::find(Auth::user()->dpt_id);
		return view('departmenttimetable', compact('venues', 'times', 'monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'department'));
	}

	// Master Timetable
	public function mainTimetable()
	{
		return Schedule::rightJoin('venues', 'venues.id', 'venue_id')
								->rightJoin('times', 'times.id', 'time_id')
								->leftJoin('users', 'users.id', 'user_id')
								->leftJoin('subjects', 'subjects.id', 'subject_id')
								->leftJoin('study_levels', 'study_levels.id', 'schedules.study_level_id')
								->leftJoin('departments', 'departments.id', 'department_id')
								->select('schedules.id', 'times.start_time', 'times.end_time', 'times.days', 'users.name as user_name', 'subjects.name as subject_name', 'subjects.code as subject_code', 'study_levels.name as study_level_name', 'venues.name as venue_name', 'venues.capacity as venue_capacity', 'departments.name as department_name', 'schedules.status')
								->orderBy('start_time', 'asc')
								->orderByRaw(DB::raw("FIELD(days, 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday')"))
								->orderBy('venues.id', 'asc')
								->get();
	}

	// Department Timetable
	public function dptTimetable()
	{
		return Schedule::rightJoin('venues', 'venues.id', 'venue_id')
						->rightJoin('times', 'times.id', 'time_id')
						->leftJoin('users', 'users.id', 'user_id')
						->leftJoin('subjects', 'subjects.id', 'subject_id')
						->leftJoin('study_levels', 'study_levels.id', 'schedules.study_level_id')
						->leftJoin('departments', 'departments.id', 'department_id')
						->select('schedules.id', 'times.start_time', 'times.end_time', 'times.days', 'users.name as user_name', 'subjects.name as subject_name', 'subjects.code as subject_code', 'study_levels.name as study_level_name', 'venues.name as venue_name', 'venues.capacity as venue_capacity', 'departments.name as department_name', 'schedules.status')
						->where('department_id', Auth::user()->dpt_id)
						->orderBy('start_time', 'asc')
						->orderByRaw(DB::raw("FIELD(days, 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday')"))
						->orderBy('venues.id', 'asc')
						->get();
	}

}

