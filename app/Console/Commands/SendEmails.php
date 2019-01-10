<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Jobs\SendVerificationEmail;
use App\User;
use Log;

class SendEmails extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send:emails';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Re-send verification emails.';

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
        $users = User::where('verified', 0)->get();
        foreach ($users as $u) {            
            dispatch(new SendVerificationEmail($u));
            Log::info('Re-sent verification email for ' . $u->email);
        }
    }
}
