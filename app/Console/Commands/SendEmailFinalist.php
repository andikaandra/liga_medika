<?php

namespace App\Console\Commands;

use App\Events\ParticipantSelectedForFinal;
use Illuminate\Console\Command;
use App\User;

class SendEmailFinalist extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'email-finalist:send {email}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send finalist email to a user (input by email).';

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
        $email = $this->argument('email');
        $user = User::where('email', $email)->first();

        if (!$user)
        {
            echo 'User with given email ' . $email . ' not found' . "\n";
            return;
        }
        echo 'Sending finalist email to ' . $email . "\n";
        event(new ParticipantSelectedForFinal($user));
        echo 'Finalist email send to ' . $email . "\n";
    }
}
