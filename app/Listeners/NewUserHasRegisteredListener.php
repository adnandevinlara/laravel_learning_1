<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue; 
use App\Events\NewUserHasRegisteredEvent;
// use Illuminate\Support\Facades\Mail;
use Mail;
use App\Mail\WelcomeNewUserMail;
class NewUserHasRegisteredListener implements ShouldQueue 
{
   
   

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        $data = array(
            'title' => 'Mail from Adnan-Soft',
            'body' => 'This is for testing email using smtp',
            'email' =>$event->user->email,
        );

        Mail::to($event->user->email)->send(new WelcomeNewUserMail($data));
        dump('Mail Sent to user');
         
    }
}
