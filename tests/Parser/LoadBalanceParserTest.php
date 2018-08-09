<?php

namespace Laundrette\Test\Parser;

use Laundrette\Parser\LoadBalanceParser;
use Laundrette\Test\TestCase;

class LoadBalanceParserTest extends TestCase
{
    public function testCanParseLoadBalance(): void
    {
        $fixture = $this->getFixture('ELS_DEB/LoadBalance.aspx');
        $parser = new LoadBalanceParser();
        $data = $parser->parse($fixture);

        $this->assertEquals("12.42", $data['balance']);
        $this->assertEquals(5, count($data['transactions']));
    }
}
