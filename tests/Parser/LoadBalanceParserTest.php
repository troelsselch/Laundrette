<?php

namespace Laundrette\Test\Parser;

use Laundrette\Parser\LoadBalanceParser;
use Laundrette\Test\TestCase;

class LoadBalanceParserTest extends TestCase
{
    public function testCanParseLoadBalance(): void
    {
        $fixture = $this->getFixture('ELS_DEB/LoadBalance.aspx');
        $parser = new LoadBalanceParser($fixture);
        $data = $parser->parse();

        $this->assertEquals(12.42, $data['balance']);
        $this->assertEquals(5, count($data['transactions']));
    }
}
