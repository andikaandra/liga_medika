<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\User;
use App\Jobs\AddPhoneNumberEmailAnnouncement as AddPhoneNumberEmailAnnouncementJob;

class AddPhoneNumberEmailAnnouncement extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'announce:add-phone-number';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Announce through email for participants to add their phone number.';

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
        $users = User::where('lomba_verified', 1)->whereNull('phone')->get();
        foreach($users as $user) {
            dispatch(new AddPhoneNumberEmailAnnouncementJob($user));
            echo 'sent for user ' . $user->name;
        }
    }
}
