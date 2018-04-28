<?php

namespace App\Providers;

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
        'App\Events\UserEvent'   => [
            'App\Listeners\UserListener',
        ],
        'App\Events\AddEvent'    => [
            'App\Listeners\AddListener',
        ],
        'App\Events\UpdateEvent' => [
            'App\Listeners\UpdateListener',
        ],
        'App\Events\DeleteEvent' => [
            'App\Listeners\DeleteListener',
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
