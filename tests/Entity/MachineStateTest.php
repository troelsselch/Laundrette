<?php

namespace Laundrette\Test\Entity;

use Laundrette\Entity\Machine;
use Laundrette\Entity\MachineState;
use Laundrette\Test\TestCase;

class MachineStateTest extends TestCase
{

    public function testCanCreateAndToString(): void
    {
        $machine = new Machine('Example', 'State');
        $state = new MachineState($machine, true, false);
        $this->assertEquals('Laundrette\Entity\MachineState: Laundrette\Entity\Machine: Example, State, Booked by me=Yes, Available=No', (string)$state);
    }
}
