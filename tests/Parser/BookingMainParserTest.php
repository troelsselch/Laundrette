<?php

namespace Laundrette\Test\Parser;

use Laundrette\Parser\BookingMainParser;
use Laundrette\Test\TestCase;

class BookingMainParserTest extends TestCase
{
    public function testCanParseBookingMain(): void
    {
        $fixture = $this->getFixture('Booking/BookingMain.aspx');
        $parser = new BookingMainParser();
        $b = $parser->parse($fixture);

        $this->assertEquals("Dine nuværende bestillinger", $b['message']);
        $this->assertEquals(2, count($b['reservations']));
    }
}
