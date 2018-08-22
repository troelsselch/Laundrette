<?php

use Laundrette\Test\TestCase;
use Laundrette\Laundrette;
use Laundrette\Adapter\AdapterInterface;
use Laundrette\Entity\TimeSlot;

class LaundretteFeatureTest extends TestCase
{
    public function testCanGetReservations() : void
    {
        $fixture = file_get_contents(__DIR__ . '/../Fixtures/Booking/BookingMain.aspx');
        $adapter = Mockery::mock(AdapterInterface::class);
        $method = $adapter->shouldReceive('call');
        $method->andReturn($fixture);

        $api = new Laundrette($adapter);

        $data = $api->getReservations();

        $this->assertCount(2, $data);
        $this->assertEquals(
            'Reservation on 2018-11-15 19:00 for Machine: VASK 2',
            $data[0]
        );
        $this->assertEquals(
            'Reservation on 2018-11-15 19:00 for Machine: VASK 3',
            $data[1]
        );
    }

    public function testCanGetBalance() : void
    {
        $fixture = file_get_contents(__DIR__ . '/../Fixtures/ELS_DEB/LoadBalance.aspx');
        $adapter = Mockery::mock(AdapterInterface::class);
        $method = $adapter->shouldReceive('call');
        $method->andReturn($fixture);

        $api = new Laundrette($adapter);

        $data = $api->getBalance();
        $this->assertEquals(12.42, $data);
    }

    public function testCanGetTransactions() : void
    {
        $fixture = file_get_contents(__DIR__ . '/../Fixtures/ELS_DEB/LoadBalance.aspx');
        $adapter = Mockery::mock(AdapterInterface::class);
        $method = $adapter->shouldReceive('call');
        $method->andReturn($fixture);

        $api = new Laundrette($adapter);

        $data = $api->getTransactions();

        $this->assertCount(5, $data);
        $this->assertEquals(
            'Transaction: 2016-10-31 17:40, (Machine: VASK 1), 1000',
            $data[0]
        );
        $this->assertEquals(
            'Transaction: 2016-10-31 17:40, (Machine: R 5), 4050',
            $data[1]
        );
        $this->assertEquals(
            'Transaction: 2016-10-31 17:37, (Machine: VASK 2), 1000',
            $data[2]
        );
        $this->assertEquals(
            'Transaction: 2016-10-31 17:36, (Machine: R 4), 2250',
            $data[3]
        );
        $this->assertEquals(
            'Transaction: 2016-10-31 17:35, (Machine: VASK 3), 1000',
            $data[4]
        );
    }

    public function testCanGetMachineStates() : void
    {
        $fixture = file_get_contents(__DIR__ . '/../Fixtures/Machine/MachineGroupStat.aspx');
        $adapter = Mockery::mock(AdapterInterface::class);
        $method = $adapter->shouldReceive('call');
        $method->andReturn(utf8_decode($fixture));

        $api = new Laundrette($adapter);

        $data = $api->getMachineStates();

        $this->assertCount(5, $data);
        $this->assertEquals(
            'MachineState: Machine: VASK 1, Booked by me=No, Available=Yes (VASK 1 Afsluttedes 09:40)',
            $data[0]
        );
        $this->assertEquals(
            'MachineState: Machine: VASK 2, Booked by me=No, Available=No (VASK 2 Klar ca: 18:36)',
            $data[1]
        );
        $this->assertEquals(
            'MachineState: Machine: VASK 3, Booked by me=No, Available=No (VASK 3 Klar ca: 18:37)',
            $data[2]
        );
        $this->assertEquals(
            'MachineState: Machine: TØR 4, Booked by me=No, Available=Yes (TØR 4 Afsluttedes 17:58)',
            $data[3]
        );
        $this->assertEquals(
            'MachineState: Machine: TØR 5, Booked by me=No, Available=Yes (TØR 5 Afsluttedes 17:41)',
            $data[4]
        );
    }

    public function testCanGetBookingCalendar() : void
    {
        $fixture = file_get_contents(__DIR__ . '/../Fixtures/Booking/BookingCalendar.aspx');
        $adapter = Mockery::mock(AdapterInterface::class);
        $method = $adapter->shouldReceive('call');
        $method->andReturn(utf8_decode($fixture));

        $api = new Laundrette($adapter);

        $data = $api->getBookingCalendar();
        print "\n";
        /** @var TimeSlot $item */
        foreach ($data as $item) {
            print $item->getTimeslot() . ' ' . $item->getDatetime() . ' ' . ($item->isAvailable() ? 'A' : 'NA') . PHP_EOL;
        }
    }

    public function testCanBookingCalendarChangeMonth() : void
    {
        $fixture = file_get_contents(__DIR__ . '/../Fixtures/Booking/BookingCalendar2.aspx');
        $adapter = Mockery::mock(AdapterInterface::class);
        $method = $adapter->shouldReceive('call');
        $method->andReturn(utf8_decode($fixture));

        $api = new Laundrette($adapter);

        $data = $api->getBookingCalendar();
        print "\n";
        /** @var TimeSlot $item */
        foreach ($data as $item) {
            printf("%s %s %s\n",
                $item->getTimeslot(),
                $item->getDatetime()->format('Y-m-d'),
                ($item->isAvailable() ? 'A' : 'NA')
            );
        }
        // TODO Asserts.
    }

    public function testCanBookingCalendarChangeYear() : void
    {
        $fixture = file_get_contents(__DIR__ . '/../Fixtures/Booking/BookingCalendar3.aspx');
        $adapter = Mockery::mock(AdapterInterface::class);
        $method = $adapter->shouldReceive('call');
        $method->andReturn(utf8_decode($fixture));

        $api = new Laundrette($adapter);

        $data = $api->getBookingCalendar();
        print "\n";
        /** @var TimeSlot $item */
        foreach ($data as $item) {
            printf("%s %s %s\n",
                $item->getTimeslot(),
                $item->getDatetime()->format('Y-m-d'),
                ($item->isAvailable() ? 'A' : 'NA')
            );
        }
        // TODO Asserts.
    }
}
