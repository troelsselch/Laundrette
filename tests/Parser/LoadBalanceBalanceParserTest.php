<?php

namespace Laundrette\Test\Parser;

use Laundrette\Parser\LoadBalanceBalanceParser;
use Laundrette\Test\TestCase;

class LoadBalanceBalanceParserTest extends TestCase
{
    public function testCanParseLoadBalance(): void
    {
        $fixture = $this->getFixture('ELS_DEB/LoadBalance.aspx');
        $parser = new LoadBalanceBalanceParser($fixture);
        $data = $parser->parse();

        $this->assertEquals(12.42, $data);
    }
}
