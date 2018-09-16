<?php

namespace Tests\Models;

use App\Models\Machine;
use Tests\TestCase;

class MachineTest extends TestCase
{

    public function testCanCreateAndToString(): void
    {
        $machine = new Machine('Example');
        $this->assertEquals('Machine: Example', (string)$machine);
    }
}
