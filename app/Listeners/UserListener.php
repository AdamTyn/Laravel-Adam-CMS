<?php

namespace App\Listeners;

use App\Events\UserEvent;
use App\Models\Log;

class UserListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  UserEvent  $event
     * @return void
     */
    public function handle(UserEvent $event)
    {
        $time = date('Y-m-d H:i:s', $_SERVER['REQUEST_TIME']);
        $user = $event->user;
        Log::create([
            'user'    => $user['name'],
            'time'    => $time,
            'content' => $user['type'],
        ]);
    }
}
