<?php

namespace Laundrette\Test\Parser;

use Laundrette\Parser\MachineGroupStatParser;
use Laundrette\Test\TestCase;

class MachineGroupStatParserTest extends TestCase
{
    public function testCanParseMachineGroupStat(): void
    {
        $fixture = $this->getFixture('Machine/MachineGroupStat.aspx');
        $parser = new MachineGroupStatParser();
        $b = $parser->parse($fixture);

        $this->assertEquals(5, count($b));
        $this->assertInstanceOf('Laundrette\Entity\MachineState', $b[0]);
    }
}
