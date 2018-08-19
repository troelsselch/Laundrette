<?php

namespace Laundrette\Entity;

class MachineState
{

    private $machine;

    private $bookedByMe;

    private $available;

    private $stateString;

    public function __construct(
        Machine $machine,
        bool $bookedByMe,
        bool $available,
        string $stateString = ''
    ) {

        $this->machine = $machine;
        $this->bookedByMe = $bookedByMe;
        $this->available = $available;
        $this->stateString = $stateString;
    }

    public function __toString()
    {
        $format = '%s: (%s), Booked by me=%s, Available=%s';
        if (!empty($this->stateString)) {
            $format .= sprintf(' (%s)', $this->stateString);
        }

        return sprintf(
            $format,
            get_class(),
            $this->machine,
            $this->bookedByMe ? 'Yes' : 'No',
            $this->available ? 'Yes' : 'No'
        );
    }
}
