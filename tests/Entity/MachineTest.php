<?php

namespace Laundrette\Test\Entity;

use Laundrette\Entity\Machine;
use Laundrette\Test\TestCase;

class MachineTest extends TestCase
{

    public function testCanCreateAndToString(): void
    {
        $machine = new Machine('Example', 'State');
        $this->assertEquals('Laundrette\Entity\Machine: Example, State', (string)$machine);
    }
}
