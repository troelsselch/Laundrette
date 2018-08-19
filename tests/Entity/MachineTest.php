<?php

namespace Laundrette\Test\Entity;

use Laundrette\Entity\Machine;
use Laundrette\Test\TestCase;

class MachineTest extends TestCase
{

    public function testCanCreateAndToString(): void
    {
        $machine = new Machine('Example');
        $this->assertEquals('Laundrette\Entity\Machine: Example', (string)$machine);
    }

    public function testCanCreateFromString()
    {
        $strings = [
            'VASK 1' => 'VASK 1',
            'VASK 2' => 'VASK 2',
            'VASK 3' => 'VASK 3',
            'TØR 4' => 'TØR 4',
            'TØR 5' => 'TØR 5',
            'TØR 4 Afsluttedes 17:02' => 'TØR 4',
            'VASK 2 (Ledig)' => 'VASK 2',
            'TØR 4 Klar ca: 20:18' => 'TØR 4',
        ];

        foreach ($strings as $before => $after) {
            $machine = Machine::createFromString($before);
            $this->assertInstanceOf(Machine::class, $machine);
            $this->assertEquals($after, $machine->getName());
        }
    }
}
