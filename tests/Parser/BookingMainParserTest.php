<?php

namespace Laundrette\Test\Parser;

use Laundrette\Parser\BookingMainParser;
use Laundrette\Test\TestCase;

class BookingMainParserTest extends TestCase
{
    public function testCanParseBookingMain(): void
    {
        $fixture = $this->getFixture('Booking/BookingMain.aspx');
        $parser = new BookingMainParser($fixture);
        $data = $parser->parse();

        $this->assertEquals(2, count($data));
    }
}
