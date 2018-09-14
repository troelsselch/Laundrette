<?php

namespace Laundrette\Test\Parser;

use Laundrette\Parser\VersionParser;
use Laundrette\Test\TestCase;

class VersionParserTest extends TestCase
{
    public function testCanParseVersion(): void
    {
        $fixture = $this->getFixture('DefaultLogin.html');
        $parser = new VersionParser($fixture);
        $data = $parser->parse();

        $this->assertEquals('1.2.0.2', $data);
    }
}
