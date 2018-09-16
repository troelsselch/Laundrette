<?php

namespace Tests\Parsers;

use App\Parsers\LoadBalanceBalanceParser;
use Tests\TestCase;

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
