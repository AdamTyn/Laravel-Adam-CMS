<?php

namespace App\Events;

class UserEvent
{
    public $user;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(array $user)
    {
        $this->user=$user;
    }
}
