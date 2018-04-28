<?php

namespace App\Events;

class UpdateEvent
{
    public $ups;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(array $ups)
    {
        $this->ups=$ups;
    }
}
