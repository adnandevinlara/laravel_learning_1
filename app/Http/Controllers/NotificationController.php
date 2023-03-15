<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notifications\NotifyUser;

use Notification;
use App\Notifications\MyFirstNotification;

use App\User;
use App\Events;
use App\Events\NewUserHasRegisteredEvent;
use App\Events\PurchaseSuccessful;

use App\Jobs\SendNewUserRegisteredNotification;

use Mail;
use App\Mail\WelcomeNewUserMail;
// use Illuminate\Bus\Queueable;
// use Illuminate\Foundation\Bus\Dispatchable;

// use Illuminate\Bus\Chain;
// use Illuminate\Support\Facades\Bus;


use App\Jobs\TaskOne;
use App\Jobs\TaskTwo;
use App\Jobs\TaskThree;
use App\Jobs\TaskFour;

use Illuminate\Support\Facades\Bus;

use App\Purchase;
class NotificationController extends Controller
{
    public function sendNotification(Request $request){
    	User::find(1)->Notify(new NotifyUser);

    	// // send notification to user
    	// $user = User::first();
    	// Notification::send($user,new NotifyUser);

    	dd('User Notified with queue job');
    }

    public function sendMailNotification(){


    	$user = User::first();
  
        $details = [
            'greeting' => 'Hi Artisan',
            'body' => 'This is my first notification from ItSolutionStuff.com',
            'thanks' => 'Thank you for using ItSolutionStuff.com tuto!',
            'actionText' => 'View My Site',
            'actionURL' => url('/'),
            'order_id' => 101
        ];
  
        Notification::send($user, new MyFirstNotification($details));
   
        dd('MailNotifyDone with queue job');
    }

    public function newUserRegisterMail(Request $request){

    	// grab the first user
        $user = User::first();
        // $user['email'] = 'adnanzaib1997@gmail.com';
        // return $user;
    	//send him email
    	//call the event
    	$data = event(new NewUserHasRegisteredEvent($user));
        dump('job created with event and listeners');
        // return $data;

    	
    	

    	

    }

    public function jobBatching(Request $request){
        // grab the first user
        $user = User::first();
        // $user['email'] = 'adnanzaib486@gmail.com';
        // return $user;
        // SendNewUserRegisteredNotification::dispatch();
        // dump($user);
        $data = array(
            'title' => 'Mail from ItSolutionStuff.com',
            'body' => 'This is for testing email using smtp',
            'email' =>$user['email'],
        );
        // Mail::to($user['email'])->send(new WelcomeNewUserMail($data));
        SendNewUserRegisteredNotification::dispatch($user);
        // SendNewUserRegisteredNotification::dispatch($user);
        // SendNewUserRegisteredNotification::dispatch($user);
        return $user;
        dump('job created');
    }

    public function chainJobs(){
        // return 1;
        $user = User::first();
        // chaining
        // TaskOne::dispatch($user);
        // TaskTwo::dispatch($user);
        // TaskThree::dispatch($user);
// simple chain
        TaskTwo::withChain([
            new TaskThree($user),
            new TaskFour($user),
            new TaskOne($user),
        ])->dispatch($user);
// chain with queue connection and queue type

// TaskTwo::withChain([
//     new TaskThree,
//     new TaskFour,
//     new TaskOne,
// ])->dispatch()->allOnConnection('database')->allOnQueue('podcasts');
        // Chain batching stop executing when one job failed

        dump('Chaining Done');
    }


    public function batchJobs(){
        // return 1;
        $user = User::first();
        // batching
        
        Bus::batch([
            new TaskOne($user),
            new TaskTwo($user),
            new TaskThree($user),
        ])->dispatch();

        dump('Batching Done');
    }


    public function dealWithFailedJob(){
    
       // https://laravel.com/docs/8.x/queues#retrying-failed-jobs

    }

    public function batchableJobs(){
        // https://laravel.com/docs/8.x/queues#job-batching
    }

    public function users(Request $request){
        return User::all();
    }


    public function successfullPurchase(){


        // $purchase = Purchase::find(6);
        // $items = (json_decode($purchase->items));
        // return $items[1];
        // dd('end');

        $items = array(1,2,3,4,5,6,7,8);
        $purchase  = Purchase::create([
            'name' => 'adnanzaib486',
            'address' => 'Lahore pakistan',
            'city' => 'Lahore',
            'zip_code' => '1244',
            'items' => json_encode($items)
        ]);

        $purchase['email'] = 'adnanzaib486@gmail.com';

        // dd($purchase);

        if($purchase){
            // send new order mail to admin
            PurchaseSuccessful::dispatch($purchase);
            dump('order created and email is dispatched!');
        }
    }
}
