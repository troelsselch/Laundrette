<?php

namespace Tests\Parsers;

use App\Parsers\LoadBalanceTransactionsParser;
use Tests\TestCase;

class LoadBalanceTransactionsParserTest extends TestCase
{
    public function testCanParseLoadBalanceTransactions(): void
    {
        $fixture = $this->getFixture('ELS_DEB/LoadBalance.aspx');
        $parser = new LoadBalanceTransactionsParser($fixture);
        $data = $parser->parse();

        $this->assertEquals(5, count($data));
    }
}
