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
        $data = $parser->parse($fixture);

        $this->assertEquals("Dine nuværende bestillinger", $data['message']);
        $this->assertEquals(2, count($data['reservations']));
    }
}
