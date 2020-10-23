<?php

namespace App\Models;

class MachineState
{
    /** @var Machine */
    private $machine;

    /** @var bool */
    private $bookedByMe;

    /** @var bool */
    private $available;

    /** @var string */
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

    /**
     * @return Machine
     */
    public function getMachine() : Machine
    {
        return $this->machine;
    }

    /**
     * @return bool
     */
    public function isBookedByMe() : bool
    {
        return $this->bookedByMe;
    }

    /**
     * @return bool
     */
    public function isAvailable() : bool
    {
        return $this->available;
    }

    /**
     * @return string
     */
    public function getStateString() : string
    {
        return $this->stateString;
    }


    public function __toString()
    {
        $format = 'MachineState: %s, Booked by me=%s, Available=%s';
        if (!empty($this->stateString)) {
            $format .= sprintf(' (%s)', $this->stateString);
        }

        return sprintf(
            $format,
            $this->machine,
            $this->bookedByMe ? 'Yes' : 'No',
            $this->available ? 'Yes' : 'No'
        );
    }
}
