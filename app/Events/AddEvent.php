<?php

namespace App\Events;

class AddEvent
{
    public $inserts;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(array $inserts)
    {
        $this->inserts=$inserts;
    }
}
