<?php

namespace Laundrette\Test\Entity;

use DateTime;
use Laundrette\Entity\Machine;
use Laundrette\Entity\Reservation;
use Laundrette\Test\TestCase;

class ReservationTest extends TestCase
{

    public function testCanCreateAndToString(): void
    {
        $machine = new Machine('Example');
        $dt = DateTime::createFromFormat('Y-m-d', '2018-06-06');
        $reservation = new Reservation($dt, $machine);
        $this->assertEquals(
            sprintf(
                'Laundrette\Entity\Reservation: (%s), Laundrette\Entity\Machine: Example',
                $dt->format('Y-m-d H:i:s')
            ),
            (string)$reservation
        );
    }
}
