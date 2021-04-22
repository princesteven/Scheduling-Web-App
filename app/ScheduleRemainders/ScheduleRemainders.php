<?php
namespace App\ScheduleRemainders;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use App\Mail\RemainderMail;
class ScheduleRemainders
{
    function __construct()
    { 
        echo \App\Schedule::periodsDue()->count();
        $this->schedules = \App\Schedule::periodsDue()->get();
    }
    /**
     * Send reminders for each appointment
     *
     * @return void
     */
    public function sendReminders()
    {   
        $this->schedules->each(
            function ($schedule) {
                $this->_remindAbout($schedule);
            

            }
        );
    }
   
    private function _remindAbout($schedule)
    {
        $subject = $schedule->subject_name;
        $venue = $schedule->venue_name;
        $start_time = $schedule->start_time;
        $end_time = $schedule->end_time;
        $message = "You have $subject from $start_time to $end_time at $venue";
        $users = $this->_getUsers($schedule);
        $this->_sendMessage($users, $message);
    }
    private function _getUsers($schedule){
        $dept = $schedule->department_id;
        $level = $schedule->study_level_id;
        $course = $schedule->course_id;
        $users =  \App\User::where('dpt_id',$dept)
                     ->where('study_level_id',$level)
                     ->where('course_id',$course)
                     ->get();
        return $users;
        
    }
    /**
     * Sends a single message using the app's global configuration
     *
     * @param string $number  The number to message
     * @param string $content The content of the message
     *
     * @return void
     */
    private function _sendMessage($users, $content)

    {
        foreach($users as $user){
          
            // Mail::to($user->email)->send(new RemainderMail($user->name,$content));
            $this->SendSMS('http://127.0.0.1:8800/', 'Mylab', '', $user->mobile, $content);
            echo $user->mobile;
        }

    }

    private function SendSMS ($hostUrl, $username, $password, $phoneNoRecip, $msgText,

                  $n1 = NULL, $v1 = NULL, $n2 = NULL, $v2 = NULL, $n3 = NULL, $v3 = NULL, 

                  $n4 = NULL, $v4 = NULL, $n5 = NULL, $v5 = NULL, $n6 = NULL, $v6 = NULL, 

                  $n7 = NULL, $v7 = NULL, $n8 = NULL, $v8 = NULL, $n9 = NULL, $v9 = NULL) 
    { 
 

                   $postfields = array('Phone'=>"$phoneNoRecip", 'Text'=>"$msgText");

                   if (($n1 != NULL) && ($v1 != NULL)) $postfields[$n1] = $v1;

                   if (($n2 != NULL) && ($v2 != NULL)) $postfields[$n2] = $v2;

                   if (($n3 != NULL) && ($v3 != NULL)) $postfields[$n3] = $v3;

                   if (($n4 != NULL) && ($v4 != NULL)) $postfields[$n4] = $v4;

                   if (($n5 != NULL) && ($v5 != NULL)) $postfields[$n5] = $v5;

                   if (($n6 != NULL) && ($v6 != NULL)) $postfields[$n6] = $v6;

                   if (($n7 != NULL) && ($v7 != NULL)) $postfields[$n7] = $v7;

                   if (($n8 != NULL) && ($v8 != NULL)) $postfields[$n8] = $v8;

                   if (($n9 != NULL) && ($v9 != NULL)) $postfields[$n9] = $v9;

                   $ch = curl_init();

                   curl_setopt($ch, CURLOPT_URL, $hostUrl);

                   curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

                   curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);

                   curl_setopt($ch, CURLOPT_POST, 1);

                   curl_setopt($ch, CURLOPT_POSTFIELDS, $postfields);


                   curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0); // change to 1 to verify cert

                   curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);

                   curl_setopt($ch, CURLOPT_USERPWD, "$username:$password");

                   curl_setopt($ch, CURLOPT_HTTPHEADER, array('Expect:')); 

                   $result = curl_exec($ch);

                   return $result;

 

    }
}