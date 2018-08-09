<?php

namespace Laundrette\Test\Parser;

use Laundrette\Parser\LoginFormParser;
use Laundrette\Test\TestCase;

class LoginFormParserTest extends TestCase
{
    public function testCanParseLoginForm(): void
    {
        $fixture = $this->getFixture('DefaultLogin.html');
        $parser = new LoginFormParser();
        $b = $parser->parse($fixture);

        $this->assertEquals('_ctl0$ContentPlaceHolder1$btOK', $b['__EVENTTARGET']);
        $this->assertEquals('EF7E10', $b['__VIEWSTATEGENERATOR']);
        $this->assertEquals('/wEPDwUJLTY3OTUyMjQ4D2QWAmYPZBYCAgMPZBYGAgEPDxYCHgdWaXNpYmxlaGQWAmYPFQEHTG9nIGlu', $b['__VIEWSTATE']);
        $this->assertEquals('/wEWBgKKmN/lAwKYhs/kAgKjkuQsAvbzwL0OAriY0qc4=', $b['__EVENTVALIDATION']);
    }
}
