<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class SendRemainder extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'remainder:send';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send an sms using now sms';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $scheduleReminder = new \App\ScheduleRemainders\ScheduleRemainders();
        $scheduleReminder->sendReminders();
       
     
    }
}
