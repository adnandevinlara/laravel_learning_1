<?php

namespace App\Providers;

use Illuminate\Auth\Events\Registered;
use App\Events\NewUserHasRegisteredEvent;
// use App\Events\Listeners\NewUserHasRegisteredListener;
// use App\Events\Listeners\ResigterUserToNewsLetter;
// use App\Events\Listeners\NotifyAdminViaSlack;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        NewUserHasRegisteredEvent::class => [
            \App\Listeners\NewUserHasRegisteredListener::class,
            \App\Listeners\ResigterUserToNewsLetter::class,
            \App\Listeners\NotifyAdminViaSlack::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
