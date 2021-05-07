<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('login');
});

Route::prefix('venues')->middleware('auth')->group(function () {
    Route::get('/', 'VenueController@index')->name('venues');
    Route::post('/create', 'VenueController@create')->name('createVenue');
    Route::post('/edit', 'VenueController@edit')->name('editVenue');
    Route::post('/delete', 'VenueController@delete')->name('deleteVenue');
});

Route::prefix('wings')->middleware('auth')->group(function () {
    Route::get('/', 'WingController@index')->name('wings');
    Route::post('/create', 'WingController@create')->name('createWing');
    Route::post('/edit', 'WingController@edit')->name('editWing');
    Route::post('/delete', 'WingController@delete')->name('deleteWing');
});

Route::prefix('semesters')->middleware('auth')->group(function () {
    Route::get('/', 'SemesterController@index')->name('semesters');
    Route::post('/create', 'SemesterController@create')->name('createSemester');
    Route::post('/edit', 'SemesterController@edit')->name('editSemester');
    Route::post('/delete', 'SemesterController@delete')->name('deleteSemester');
});

Route::prefix('ranks')->middleware('auth')->group(function () {
    Route::get('/', 'RankController@index')->name('ranks');
    Route::post('/create', 'RankController@create')->name('createRank');
    Route::post('/edit', 'RankController@edit')->name('editRank');
    Route::post('/delete', 'RankController@delete')->name('deleteRank');
});

Route::prefix('categories')->middleware('auth')->group(function () {
    Route::get('/', 'CategoryController@index')->name('categories');
    Route::post('/create', 'CategoryController@create')->name('createCategory');
    Route::post('/edit', 'CategoryController@edit')->name('editCategory');
    Route::post('/delete', 'CategoryController@delete')->name('deleteCategory');
});


Route::prefix('study_levels')->middleware('auth')->group(function () {
    Route::get('/', 'StudyLevelController@index')->name('study_levels');
    Route::post('/create', 'StudyLevelController@create')->name('createStudyLevel');
    Route::post('/edit', 'StudyLevelController@edit')->name('editStudyLevel');
    Route::post('/delete', 'StudyLevelController@delete')->name('deleteStudyLevel');
});

Route::prefix('days')->middleware('auth')->group(function () {
    Route::get('/', 'DayController@index')->name('days');
    Route::post('/create', 'DayController@create')->name('createDay');
    Route::post('/edit', 'DayController@edit')->name('editDay');
    Route::post('/delete', 'DayController@delete')->name('deleteDay');
});

Route::prefix('study_years')->middleware('auth')->group(function () {
    Route::get('/', 'StudyYearController@index')->name('study_years');
    Route::post('/create', 'StudyYearController@create')->name('createStudyYear');
    Route::post('/edit', 'StudyYearController@edit')->name('editStudyYear');
    Route::post('/delete', 'StudyYearController@delete')->name('deleteStudyYear');
});

Route::prefix('times')->middleware('auth')->group(function () {
    Route::get('/', 'TimeController@index')->name('times');
    Route::post('/create', 'TimeController@create')->name('createTime');
    Route::post('/edit', 'TimeController@edit')->name('editTime');
    Route::post('/delete', 'TimeController@delete')->name('deleteTime');
});

Route::prefix('units')->middleware('auth')->group(function () {
    Route::get('/', 'UnitController@index')->name('units');
    Route::post('/create', 'UnitController@create')->name('createUnit');
    Route::post('/edit', 'UnitController@edit')->name('editUnit');
    Route::post('/delete', 'UnitController@delete')->name('deleteUnit');
});

Route::prefix('courses')->middleware('auth')->group(function () {
    Route::get('/', 'CourseController@index')->name('courses');
    Route::post('/create', 'CourseController@create')->name('createCourse');
    Route::post('/edit', 'CourseController@edit')->name('editCourse');
    Route::post('/delete', 'CourseController@delete')->name('deleteCourse');
});

Route::prefix('departments')->middleware('auth')->group(function () {
    Route::get('/', 'DepartmentController@index')->name('departments');
    Route::post('/create', 'DepartmentController@create')->name('createDepartment');
    Route::post('/edit', 'DepartmentController@edit')->name('editDepartment');
    Route::post('/delete', 'DepartmentController@delete')->name('deleteDepartment');
});

Route::prefix('faculties')->middleware('auth')->group(function () {
    Route::get('/', 'FacultyController@index')->name('faculties');
    Route::post('/create', 'FacultyController@create')->name('createFaculty');
    Route::post('/edit', 'FacultyController@edit')->name('editFaculty');
    Route::post('/delete', 'FacultyController@delete')->name('deleteFaculty');
});

Route::prefix('timeTable')->middleware('auth')->group(function () {
    Route::get('/', 'TimeTableController@index')->name('timetableCreate');
    Route::get('/items', 'TimeTableController@timeTableItems');
    Route::get('/courses', 'TimeTableController@courses')->name('courseAPI');
    Route::get('/subjects', 'TimeTableController@subjects')->name('subjectAPI');
    Route::get('/returnSubjects', 'TimeTableController@returnsubjects')->name('returnsubjectAPI');
    Route::post('/insertTimetable', 'TimeTableController@insertTimetable')->name('insertTimetable');
    Route::get('/view/timetable', 'TimeTableController@viewTimetable')->name('viewTimetable');
    Route::get('/print/timetable', 'TimeTableController@printTimetable')->name('printTimetable');
    Route::get('/searchResults', 'TimeTableController@searchResults')->name('searchResults');
    Route::get('/request/change', 'TimeTableController@requestChange')->name('requestChangeTimetable');
    Route::get('/view/change-requests', 'TimeTableController@viewChangeRequests')->name('viewChangeRequests');
    Route::post('/create', 'TimeTableController@create')->name('createTimeTable');
    Route::post('/edit', 'TimeTableController@edit')->name('editTimeTable');
    Route::post('/delete', 'TimeTableController@delete')->name('deleteTimeTable');
    Route::post('/request/change', 'TimeTableController@submitChangeRequest')->name('submitChangeRequestTimetable');
    Route::post('/accept/change-requests', 'TimeTableController@acceptChangeRequest')->name('acceptChangeRequest');
    Route::post('/deny/change-requests', 'TimeTableController@denyChangeRequest')->name('denyChangeRequest');
    Route::get('/schedule', 'TimeTableController@scheduleByLecture')->name('scheduleByLecture');
    Route::get('/periods', 'TimeTableController@periods');
    Route::get('/form','TimeTableController@form');
    Route::get('/preview','TimeTableController@preview');
    Route::get('filter-venue','TimeTableController@filterVenues');
    Route::get('/change-requests', 'TimeTableController@viewChangeRequests')->name('changeRequests');
    Route::get('/view/master-timetable', 'TimeTableController@masterTimetable')->name('masterTimetable');
    Route::get('/view/department-timetable', 'TimeTableController@departmentTimetable')->name('departmentTimetable');
});

Route::prefix('subjects')->middleware('auth')->group(function () {
    Route::get('/', 'SubjectController@index')->name('subjects');
    Route::post('/create', 'SubjectController@create')->name('createSubject');
    Route::post('/edit', 'SubjectController@edit')->name('editSubject');
    Route::post('/delete', 'SubjectController@delete')->name('deleteSubject');
});

Route::prefix('user')->middleware('auth')->group(function () {
    Route::get('/change_password', 'UserController@index')->name('password_change');
    Route::post('/change_password', 'UserController@update')->name('update_password');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

