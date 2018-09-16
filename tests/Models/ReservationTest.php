<?php

namespace Tests\Models;

use DateTime;
use App\Models\Machine;
use App\Models\Reservation;
use Tests\TestCase;

class ReservationTest extends TestCase
{

    public function testCanCreateAndToString(): void
    {
        $machine = new Machine('Example');
        $dt = DateTime::createFromFormat('Y-m-d', '2018-06-06');
        $reservation = new Reservation($dt, $machine);
        $this->assertEquals(
            sprintf(
                'Reservation on %s for Machine: Example',
                $dt->format('Y-m-d H:i')
            ),
            (string)$reservation
        );
    }
}
