<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Mail;
use App\Mail\WelcomeNewUserMail;
use App\User;
class SendNewUserRegisteredNotification implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    public $user;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($user)
    {
        $this->user = $user;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        // $user1 = User::first();
        // dump($user1);
        // Mail::to($user1->email)->send(new WelcomeNewUserMail());

        // Mail::to($user)->send(new WelcomeNewUserMail());

        $data = array(
            'title' => 'Mail from Adnan-Soft',
            'body' => 'This is for testing email using smtp',
            'email' =>$this->user['email'],
        );

        Mail::to($this->user['email'])->send(new WelcomeNewUserMail($data));

      

        // dump($this->user['email']);
    }
}
