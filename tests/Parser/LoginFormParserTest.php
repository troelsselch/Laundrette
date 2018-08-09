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
        $this->assertEquals('EF76CE10', $b['__VIEWSTATEGENERATOR']);
        $this->assertEquals('/wEPDwUJLTY3OTUyMjQ4D2QWAmYPZBYCAgMPZBYGAgEPDxYCHgdWaXNpYmxlaGQWAmYPFQEHTG9nIGluZGQCAw9kFgICAQ9kFgoCAQ8PFgIeBFRleHQFrwFWZWxrb21tZW4gdGlsIFdlYiBib29raW5nIGhvcyBFbGVjdHJvbHV4IG9nIFZELVNvbHV0aW9uczxici8+IERldCBhbmJlZmFsZXMgYXQgcmVnaXN0cmVyZSBtYWlsIGFkcmVzc2UgdW5kZXIgaW5zdGlsbGluZ2VyIDxici8+IE1haWxlbiBicnVnZXMgdGlsIHDDpW1pbmRlbHNlciBvZyBnbGVtdCBrb2Rlb3JkZGQCAw8PFgIfAQUFTmF2bjpkZAIHDw8WAh8BBQxBZGdhbmdza29kZTpkZAILDw8WAh8BBQdMb2cgaW5kZGQCDQ8PFgIfAQUKR2xlbXQga29kZWRkAgUPDxYCHwEFPVZlcnNpb24gMS4yLjAuMiBDb3B5cmlnaHQgRWxlY3Ryb2x1eCBMYXVuZHJ5IFN5c3RlbSBTd2VkZW4gQUJkZGTsC47dkl/T6YyMepOlyz5fBnQPPA==', $b['__VIEWSTATE']);
        $this->assertEquals('/wEWBgKKmN/lAwKYhs/kAgKjkuQsAvbzwL0OAriY0qcIApuI3qsFPo382D51KQyLpHLpRY6lNLrH954=', $b['__EVENTVALIDATION']);
    }
}
