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

    /** @var DateTime */
    protected $datetime;
    /** @var int */
    protected $timeslot;
    /** @var bool */
    protected $available;

    /**
     * @return DateTime
     */
    public function getDatetime(): DateTime
    {
        return $this->datetime;
    }

    /**
     * @param DateTime $datetime
     */
    public function setDatetime(DateTime $datetime) : void
    {
        $this->datetime = $datetime;
    }

    /**
     * @return int
     */
    public function getTimeslot(): int
    {
        return $this->timeslot;
    }

    /**
     * @param int $timeslot
     */
    public function setTimeslot(int $timeslot) : void
    {
        $this->timeslot = $timeslot;
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