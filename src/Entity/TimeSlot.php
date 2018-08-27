<?php

namespace Laundrette\Entity;

use DateTime;

class TimeSlot
{
    const SEVEN_NINE = 1;
    const NINE_ELEVEN = 2;
    const ELEVEN_THIRTEEN = 3;
    const THIRTEEN_FIFTEEN = 4;
    const FIFTEEN_SEVENTEEN = 5;
    const SEVENTEEN_NINETEEN = 6;
    const NINETEEN_TWENTYONE = 7;

    /** @var string */
    protected $timeString;
    /** @var int */
    protected $timeSlot;
    /** @var bool */
    protected $available;

    public function getTimeString(): string
    {
        return $this->timeString;
    }

    public function setTimeString(DateTime $datetime) : void
    {
        $this->timeString = $datetime->format('Y-m-d');
    }

    /**
     * @return int
     */
    public function getTimeSlot(): int
    {
        return $this->timeSlot;
    }

    /**
     * @param int $timeSlot
     */
    public function setTimeSlot(int $timeSlot) : void
    {
        $this->timeSlot = $timeSlot;
    }

    /**
     * @return bool
     */
    public function isAvailable(): bool
    {
        return $this->available;
    }

    /**
     * @param bool $available
     */
    public function setAvailable(bool $available) : void
    {
        $this->available = $available;
    }
}
