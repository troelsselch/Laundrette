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
        $data = $parser->parse($fixture);

        $this->assertEquals(5, count($data));
        $this->assertInstanceOf('Laundrette\Entity\MachineState', $data[0]);
    }
}
