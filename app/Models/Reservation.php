<?php

namespace App\Models;

use DateTime;

class Reservation
{

    // Start time. End time will be 2 hours later.
    /** @var DateTime */
    private $datetime;

    /** @var Machine */
    private $machine;

    public function __construct(DateTime $datetime, Machine $machine)
    {
        $this->datetime = clone $datetime;
        $this->machine = clone $machine;
    }

    /**
     * @return DateTime
     */
    public function getDatetime() : DateTime
    {
        return $this->datetime;
    }

    /**
     * @return Machine
     */
    public function getMachine() : Machine
    {
        return $this->machine;
    }

    public function __toString()
    {
        return sprintf(
            'Reservation on %s for %s',
            $this->datetime->format('Y-m-d H:i'),
            $this->machine
        );
    }
}
