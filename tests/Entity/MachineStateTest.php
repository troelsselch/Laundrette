<?php

namespace Laundrette\Test\Entity;

use Laundrette\Entity\Machine;
use Laundrette\Entity\MachineState;
use Laundrette\Test\TestCase;

class MachineStateTest extends TestCase
{

    public function testCanCreateAndToString(): void
    {
        $machine = new Machine('Example');
        $state = new MachineState($machine, true, false);
        $this->assertEquals('MachineState: Machine: Example, Booked by me=Yes, Available=No', (string)$state);
    }

    public function testContainsStringState(): void
    {
        $machine = new Machine('Example');
        $stringState = ' (Ledig)';
        $state = new MachineState($machine, false, true, $stringState);
        $this->assertEquals(
            'MachineState: Machine: Example, Booked by me=No, Available=Yes ( (Ledig))',
            (string)$state
        );
    }
}
