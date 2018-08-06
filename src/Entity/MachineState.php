<?php

namespace Laundrette\Entity;

class MachineState
{
    private $machine;
    private $bookedByMe;
    private $available;

    public function __construct(
        Machine $machine,
        bool $bookedByMe,
        bool $available
    ) {
    
        $this->machine = $machine;
        $this->bookedByMe = $bookedByMe;
        $this->available = $available;
    }

    public function __toString()
    {
        return sprintf(
            '%s: %s, Booked by me=%s, Available=%s',
            get_class(),
            $this->machine,
            $this->bookedByMe ? 'Yes' : 'No',
            $this->available ? 'Yes' : 'No'
        );
    }
}
