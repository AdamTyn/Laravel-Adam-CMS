<?php

namespace App\Events;

class DeleteEvent
{
    public $dels;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(array $dels)
    {
        $this->dels=dels;
    }
}
