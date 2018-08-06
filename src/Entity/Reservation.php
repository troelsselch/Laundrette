<?php

namespace Laundrette\Entity;

use \DateTime;

class Reservation
{
  // Start time. End time will be 2 hours later.
    private $_datetime;
    private $_machine;

    public function __construct(DateTime $datetime, Machine $machine)
    {
        $this->_datetime = clone $datetime;
        $this->_machine = clone $machine;
    }

    public function __toString()
    {
        return sprintf(
            '%s: %s, %s',
            get_class(),
            $this->_datetime->format('Y-m-d H:i:s'),
            $this->_machine
        );
    }
}
