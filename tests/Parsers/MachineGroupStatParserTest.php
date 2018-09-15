<?php

namespace Tests\Parsers;

use App\Models\MachineState;
use App\Parsers\CurrentMachineStateParser;
use Tests\TestCase;

class MachineGroupStatParserTest extends TestCase
{
    public function testCanParseMachineGroupStat(): void
    {
        $fixture = $this->getFixture('Machine/MachineGroupStat.aspx');
        $parser = new CurrentMachineStateParser($fixture);
        $data = $parser->parse();

        $this->assertEquals(5, count($data));
        $this->assertInstanceOf(MachineState::class, $data[0]);
    }
}
