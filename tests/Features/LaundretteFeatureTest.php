<?php

namespace Tests;

use App\Http\Controllers\LaundretteController;
use App\Adapters\GuzzleAdapter;
use App\Models\TimeSlot;
use DateTime;
use Mockery;

class LaundretteFeatureTest extends TestCase
{
    public function testCanGetReservations() : void
    {
        $fixture = $this->getFixture('Booking/BookingMain.aspx');
        $adapter = Mockery::mock(GuzzleAdapter::class);
        $method = $adapter->shouldReceive('call');
        $method->andReturn($fixture);

        try {
            $api = new LaundretteController($adapter);
        } catch (\Exception $exception) {
            var_dump($exception);
        }

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
        $fixture = $this->getFixture('ELS_DEB/LoadBalance.aspx');
        $adapter = Mockery::mock(GuzzleAdapter::class);
        $method = $adapter->shouldReceive('call');
        $method->andReturn($fixture);

        $api = new LaundretteController($adapter);

        $data = $api->getBalance();
        $this->assertEquals(12.42, $data);
    }

    public function testCanGetTransactions() : void
    {
        $fixture = $this->getFixture('ELS_DEB/LoadBalance.aspx');
        $adapter = Mockery::mock(GuzzleAdapter::class);
        $method = $adapter->shouldReceive('call');
        $method->andReturn($fixture);

        $api = new LaundretteController($adapter);

        $data = $api->getTransactions();

        $this->assertCount(5, $data);
        $this->assertEquals(
            'Transaction: 2016-10-31 17:40, (Machine: VASK 1), 1000',
            $data[0]
        );
        $this->assertEquals(
            'Transaction: 2016-10-31 17:40, (Machine: TØR 5), 4050',
            $data[1]
        );
        $this->assertEquals(
            'Transaction: 2016-10-31 17:37, (Machine: VASK 2), 1000',
            $data[2]
        );
        $this->assertEquals(
            'Transaction: 2016-10-31 17:36, (Machine: TØR 4), 2250',
            $data[3]
        );
        $this->assertEquals(
            'Transaction: 2016-10-31 17:35, (Machine: VASK 3), 1000',
            $data[4]
        );
    }

    public function testCanGetMachineStates() : void
    {
        $fixture = $this->getFixture('Machine/MachineGroupStat.aspx');
        $adapter = Mockery::mock(GuzzleAdapter::class);
        $method = $adapter->shouldReceive('call');
        $method->andReturn($fixture);

        $api = new LaundretteController($adapter);

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

    public function testCanGetVersion() : void
    {
        $fixture = $this->getFixture('DefaultLogin.html');
        $adapter = Mockery::mock(GuzzleAdapter::class);
        $method = $adapter->shouldReceive('call');
        $method->andReturn($fixture);

        $api = new LaundretteController($adapter);

        $data = $api->getVersion();

        $this->assertEquals('1.2.0.2', $data);
    }

    public function testCanGetBookingCalendar() : void
    {
        $fixture = $this->getFixture('Booking/BookingCalendar.aspx');
        $adapter = Mockery::mock(GuzzleAdapter::class);
        $method = $adapter->shouldReceive('call');
        $method->andReturn($fixture);

        $api = new LaundretteController($adapter);

        $data = $api->getBookingCalendar();

        $this->assertCount(49, $data);

        $this->assertEquals($this->setupTimeSlots(), $data);
    }

    public function testCanBookingCalendarChangeMonth() : void
    {
        $fixture = $this->getFixture('Booking/BookingCalendar2.aspx');
        $adapter = Mockery::mock(GuzzleAdapter::class);
        $method = $adapter->shouldReceive('call');
        $method->andReturn($fixture);

        $api = new LaundretteController($adapter);

        $data = $api->getBookingCalendar();

        $this->assertEquals($this->setupTimeSlotsChangeMonth(), $data);
    }

    public function testCanBookingCalendarChangeYear() : void
    {
        $fixture = $this->getFixture('Booking/BookingCalendar3.aspx');
        $adapter = Mockery::mock(GuzzleAdapter::class);
        $method = $adapter->shouldReceive('call');
        $method->andReturn($fixture);

        $api = new LaundretteController($adapter);

        $data = $api->getBookingCalendar();

        $this->assertEquals($this->setupTimeSlotsChangeYear(), $data);
    }

    private function setupTimeSlots() : array
    {
        $ts = new TimeSlot();
        $ts->setTimeSlot(1);
        $ts->setAvailable(true);
        $ts->setTimeString(DateTime::createFromFormat('Y-m-d','2018-11-19'));
        $slots[] = $ts;
        $ts = new TimeSlot();
        $ts->setTimeSlot(2);
        $ts->setAvailable(false);
        $ts->setTimeString(DateTime::createFromFormat('Y-m-d','2018-11-19'));
        $slots[] = $ts;
        $ts = new TimeSlot();
        $ts->setTimeSlot(3);
        $ts->setAvailable(true);
        $ts->setTimeString(DateTime::createFromFormat('Y-m-d','2018-11-19'));
        $slots[] = $ts;
        $ts = new TimeSlot();
        $ts->setTimeSlot(4);
        $ts->setAvailable(false);
        $ts->setTimeString(DateTime::createFromFormat('Y-m-d','2018-11-19'));
        $slots[] = $ts;
        $ts = new TimeSlot();
        $ts->setTimeSlot(5);
        $ts->setAvailable(false);
        $ts->setTimeString(DateTime::createFromFormat('Y-m-d','2018-11-19'));
        $slots[] = $ts;
        $ts = new TimeSlot();
        $ts->setTimeSlot(6);
        $ts->setAvailable(true);
        $ts->setTimeString(DateTime::createFromFormat('Y-m-d','2018-11-19'));
        $slots[] = $ts;
        $ts = new TimeSlot();
        $ts->setTimeSlot(7);
        $ts->setAvailable(true);
        $ts->setTimeString(DateTime::createFromFormat('Y-m-d','2018-11-19'));
        $slots[] = $ts;
        $ts = new TimeSlot();
        $ts->setTimeSlot(1);
        $ts->setAvailable(true);
        $ts->setTimeString(DateTime::createFromFormat('Y-m-d','2018-11-20'));
        $slots[] = $ts;
        $ts = new TimeSlot();
        $ts->setTimeSlot(2);
        $ts->setAvailable(true);
        $ts->setTimeString(DateTime::createFromFormat('Y-m-d','2018-11-20'));
        $slots[] = $ts;
        $ts = new TimeSlot();
        $ts->setTimeSlot(3);
        $ts->setAvailable(false);
        $ts->setTimeString(DateTime::createFromFormat('Y-m-d','2018-11-20'));
        $slots[] = $ts;
        $ts = new TimeSlot();
        $ts->setTimeSlot(4);
        $ts->setAvailable(false);
        $ts->setTimeString(DateTime::createFromFormat('Y-m-d','2018-11-20'));
        $slots[] = $ts;
        $ts = new TimeSlot();
        $ts->setTimeSlot(5);
        $ts->setAvailable(false);
        $ts->setTimeString(DateTime::createFromFormat('Y-m-d','2018-11-20'));
        $slots[] = $ts;
        $ts = new TimeSlot();
        $ts->setTimeSlot(6);
        $ts->setAvailable(true);
        $ts->setTimeString(DateTime::createFromFormat('Y-m-d','2018-11-20'));
        $slots[] = $ts;
        $ts = new TimeSlot();
        $ts->setTimeSlot(7);
        $ts->setAvailable(true);
        $ts->setTimeString(DateTime::createFromFormat('Y-m-d','2018-11-20'));
        $slots[] = $ts;
        $ts = new TimeSlot();
        $ts->setTimeSlot(1);
        $ts->setAvailable(true);
        $ts->setTimeString(DateTime::createFromFormat('Y-m-d','2018-11-21'));
        $slots[] = $ts;
        $ts = new TimeSlot();
        $ts->setTimeSlot(2);
        $ts->setAvailable(true);
        $ts->setTimeString(DateTime::createFromFormat('Y-m-d','2018-11-21'));
        $slots[] = $ts;
        $ts = new TimeSlot();
        $ts->setTimeSlot(3);
        $ts->setAvailable(true);
        $ts->setTimeString(DateTime::createFromFormat('Y-m-d','2018-11-21'));
        $slots[] = $ts;
        $ts = new TimeSlot();
        $ts->setTimeSlot(4);
        $ts->setAvailable(true);
        $ts->setTimeString(DateTime::createFromFormat('Y-m-d','2018-11-21'));
        $slots[] = $ts;
        $ts = new TimeSlot();
        $ts->setTimeSlot(5);
        $ts->setAvailable(true);
        $ts->setTimeString(DateTime::createFromFormat('Y-m-d','2018-11-21'));
        $slots[] = $ts;
        $ts = new TimeSlot();
        $ts->setTimeSlot(6);
        $ts->setAvailable(true);
        $ts->setTimeString(DateTime::createFromFormat('Y-m-d','2018-11-21'));
        $slots[] = $ts;
        $ts = new TimeSlot();
        $ts->setTimeSlot(7);
        $ts->setAvailable(true);
        $ts->setTimeString(DateTime::createFromFormat('Y-m-d','2018-11-21'));
        $slots[] = $ts;
        $ts = new TimeSlot();
        $ts->setTimeSlot(1);
        $ts->setAvailable(true);
        $ts->setTimeString(DateTime::createFromFormat('Y-m-d','2018-11-22'));
        $slots[] = $ts;
        $ts = new TimeSlot();
        $ts->setTimeSlot(2);
        $ts->setAvailable(true);
        $ts->setTimeString(DateTime::createFromFormat('Y-m-d','2018-11-22'));
        $slots[] = $ts;
        $ts = new TimeSlot();
        $ts->setTimeSlot(3);
        $ts->setAvailable(true);
        $ts->setTimeString(DateTime::createFromFormat('Y-m-d','2018-11-22'));
        $slots[] = $ts;
        $ts = new TimeSlot();
        $ts->setTimeSlot(4);
        $ts->setAvailable(true);
        $ts->setTimeString(DateTime::createFromFormat('Y-m-d','2018-11-22'));
        $slots[] = $ts;
        $ts = new TimeSlot();
        $ts->setTimeSlot(5);
        $ts->setAvailable(true);
        $ts->setTimeString(DateTime::createFromFormat('Y-m-d','2018-11-22'));
        $slots[] = $ts;
        $ts = new TimeSlot();
        $ts->setTimeSlot(6);
        $ts->setAvailable(true);
        $ts->setTimeString(DateTime::createFromFormat('Y-m-d','2018-11-22'));
        $slots[] = $ts;
        $ts = new TimeSlot();
        $ts->setTimeSlot(7);
        $ts->setAvailable(false);
        $ts->setTimeString(DateTime::createFromFormat('Y-m-d','2018-11-22'));
        $slots[] = $ts;
        $ts = new TimeSlot();
        $ts->setTimeSlot(1);
        $ts->setAvailable(true);
        $ts->setTimeString(DateTime::createFromFormat('Y-m-d','2018-11-23'));
        $slots[] = $ts;
        $ts = new TimeSlot();
        $ts->setTimeSlot(2);
        $ts->setAvailable(true);
        $ts->setTimeString(DateTime::createFromFormat('Y-m-d','2018-11-23'));
        $slots[] = $ts;
        $ts = new TimeSlot();
        $ts->setTimeSlot(3);
        $ts->setAvailable(true);
        $ts->setTimeString(DateTime::createFromFormat('Y-m-d','2018-11-23'));
        $slots[] = $ts;
        $ts = new TimeSlot();
        $ts->setTimeSlot(4);
        $ts->setAvailable(true);
        $ts->setTimeString(DateTime::createFromFormat('Y-m-d','2018-11-23'));
        $slots[] = $ts;
        $ts = new TimeSlot();
        $ts->setTimeSlot(5);
        $ts->setAvailable(true);
        $ts->setTimeString(DateTime::createFromFormat('Y-m-d','2018-11-23'));
        $slots[] = $ts;
        $ts = new TimeSlot();
        $ts->setTimeSlot(6);
        $ts->setAvailable(true);
        $ts->setTimeString(DateTime::createFromFormat('Y-m-d','2018-11-23'));
        $slots[] = $ts;
        $ts = new TimeSlot();
        $ts->setTimeSlot(7);
        $ts->setAvailable(true);
        $ts->setTimeString(DateTime::createFromFormat('Y-m-d','2018-11-23'));
        $slots[] = $ts;
        $ts = new TimeSlot();
        $ts->setTimeSlot(1);
        $ts->setAvailable(true);
        $ts->setTimeString(DateTime::createFromFormat('Y-m-d','2018-11-24'));
        $slots[] = $ts;
        $ts = new TimeSlot();
        $ts->setTimeSlot(2);
        $ts->setAvailable(true);
        $ts->setTimeString(DateTime::createFromFormat('Y-m-d','2018-11-24'));
        $slots[] = $ts;
        $ts = new TimeSlot();
        $ts->setTimeSlot(3);
        $ts->setAvailable(true);
        $ts->setTimeString(DateTime::createFromFormat('Y-m-d','2018-11-24'));
        $slots[] = $ts;
        $ts = new TimeSlot();
        $ts->setTimeSlot(4);
        $ts->setAvailable(true);
        $ts->setTimeString(DateTime::createFromFormat('Y-m-d','2018-11-24'));
        $slots[] = $ts;
        $ts = new TimeSlot();
        $ts->setTimeSlot(5);
        $ts->setAvailable(true);
        $ts->setTimeString(DateTime::createFromFormat('Y-m-d','2018-11-24'));
        $slots[] = $ts;
        $ts = new TimeSlot();
        $ts->setTimeSlot(6);
        $ts->setAvailable(true);
        $ts->setTimeString(DateTime::createFromFormat('Y-m-d','2018-11-24'));
        $slots[] = $ts;
        $ts = new TimeSlot();
        $ts->setTimeSlot(7);
        $ts->setAvailable(true);
        $ts->setTimeString(DateTime::createFromFormat('Y-m-d','2018-11-24'));
        $slots[] = $ts;
        $ts = new TimeSlot();
        $ts->setTimeSlot(1);
        $ts->setAvailable(true);
        $ts->setTimeString(DateTime::createFromFormat('Y-m-d','2018-11-25'));
        $slots[] = $ts;
        $ts = new TimeSlot();
        $ts->setTimeSlot(2);
        $ts->setAvailable(true);
        $ts->setTimeString(DateTime::createFromFormat('Y-m-d','2018-11-25'));
        $slots[] = $ts;
        $ts = new TimeSlot();
        $ts->setTimeSlot(3);
        $ts->setAvailable(true);
        $ts->setTimeString(DateTime::createFromFormat('Y-m-d','2018-11-25'));
        $slots[] = $ts;
        $ts = new TimeSlot();
        $ts->setTimeSlot(4);
        $ts->setAvailable(true);
        $ts->setTimeString(DateTime::createFromFormat('Y-m-d','2018-11-25'));
        $slots[] = $ts;
        $ts = new TimeSlot();
        $ts->setTimeSlot(5);
        $ts->setAvailable(true);
        $ts->setTimeString(DateTime::createFromFormat('Y-m-d','2018-11-25'));
        $slots[] = $ts;
        $ts = new TimeSlot();
        $ts->setTimeSlot(6);
        $ts->setAvailable(true);
        $ts->setTimeString(DateTime::createFromFormat('Y-m-d','2018-11-25'));
        $slots[] = $ts;
        $ts = new TimeSlot();
        $ts->setTimeSlot(7);
        $ts->setAvailable(true);
        $ts->setTimeString(DateTime::createFromFormat('Y-m-d','2018-11-25'));
        $slots[] = $ts;

        return $slots;
    }

    private function setupTimeSlotsChangeMonth() : array
    {
        $ts = new TimeSlot();
        $ts->setTimeSlot(1);
        $ts->setAvailable(true);
        $ts->setTimeString(DateTime::createFromFormat('Y-m-d','2018-11-29'));
        $slots[] = $ts;
        $ts = new TimeSlot();
        $ts->setTimeSlot(2);
        $ts->setAvailable(false);
        $ts->setTimeString(DateTime::createFromFormat('Y-m-d','2018-11-29'));
        $slots[] = $ts;
        $ts = new TimeSlot();
        $ts->setTimeSlot(3);
        $ts->setAvailable(true);
        $ts->setTimeString(DateTime::createFromFormat('Y-m-d','2018-11-29'));
        $slots[] = $ts;
        $ts = new TimeSlot();
        $ts->setTimeSlot(4);
        $ts->setAvailable(false);
        $ts->setTimeString(DateTime::createFromFormat('Y-m-d','2018-11-29'));
        $slots[] = $ts;
        $ts = new TimeSlot();
        $ts->setTimeSlot(5);
        $ts->setAvailable(false);
        $ts->setTimeString(DateTime::createFromFormat('Y-m-d','2018-11-29'));
        $slots[] = $ts;
        $ts = new TimeSlot();
        $ts->setTimeSlot(6);
        $ts->setAvailable(true);
        $ts->setTimeString(DateTime::createFromFormat('Y-m-d','2018-11-29'));
        $slots[] = $ts;
        $ts = new TimeSlot();
        $ts->setTimeSlot(7);
        $ts->setAvailable(true);
        $ts->setTimeString(DateTime::createFromFormat('Y-m-d','2018-11-29'));
        $slots[] = $ts;
        $ts = new TimeSlot();
        $ts->setTimeSlot(1);
        $ts->setAvailable(true);
        $ts->setTimeString(DateTime::createFromFormat('Y-m-d','2018-11-30'));
        $slots[] = $ts;
        $ts = new TimeSlot();
        $ts->setTimeSlot(2);
        $ts->setAvailable(true);
        $ts->setTimeString(DateTime::createFromFormat('Y-m-d','2018-11-30'));
        $slots[] = $ts;
        $ts = new TimeSlot();
        $ts->setTimeSlot(3);
        $ts->setAvailable(false);
        $ts->setTimeString(DateTime::createFromFormat('Y-m-d','2018-11-30'));
        $slots[] = $ts;
        $ts = new TimeSlot();
        $ts->setTimeSlot(4);
        $ts->setAvailable(false);
        $ts->setTimeString(DateTime::createFromFormat('Y-m-d','2018-11-30'));
        $slots[] = $ts;
        $ts = new TimeSlot();
        $ts->setTimeSlot(5);
        $ts->setAvailable(false);
        $ts->setTimeString(DateTime::createFromFormat('Y-m-d','2018-11-30'));
        $slots[] = $ts;
        $ts = new TimeSlot();
        $ts->setTimeSlot(6);
        $ts->setAvailable(true);
        $ts->setTimeString(DateTime::createFromFormat('Y-m-d','2018-11-30'));
        $slots[] = $ts;
        $ts = new TimeSlot();
        $ts->setTimeSlot(7);
        $ts->setAvailable(true);
        $ts->setTimeString(DateTime::createFromFormat('Y-m-d','2018-11-30'));
        $slots[] = $ts;
        $ts = new TimeSlot();
        $ts->setTimeSlot(1);
        $ts->setAvailable(true);
        $ts->setTimeString(DateTime::createFromFormat('Y-m-d','2018-12-01'));
        $slots[] = $ts;
        $ts = new TimeSlot();
        $ts->setTimeSlot(2);
        $ts->setAvailable(true);
        $ts->setTimeString(DateTime::createFromFormat('Y-m-d','2018-12-01'));
        $slots[] = $ts;
        $ts = new TimeSlot();
        $ts->setTimeSlot(3);
        $ts->setAvailable(true);
        $ts->setTimeString(DateTime::createFromFormat('Y-m-d','2018-12-01'));
        $slots[] = $ts;
        $ts = new TimeSlot();
        $ts->setTimeSlot(4);
        $ts->setAvailable(true);
        $ts->setTimeString(DateTime::createFromFormat('Y-m-d','2018-12-01'));
        $slots[] = $ts;
        $ts = new TimeSlot();
        $ts->setTimeSlot(5);
        $ts->setAvailable(true);
        $ts->setTimeString(DateTime::createFromFormat('Y-m-d','2018-12-01'));
        $slots[] = $ts;
        $ts = new TimeSlot();
        $ts->setTimeSlot(6);
        $ts->setAvailable(true);
        $ts->setTimeString(DateTime::createFromFormat('Y-m-d','2018-12-01'));
        $slots[] = $ts;
        $ts = new TimeSlot();
        $ts->setTimeSlot(7);
        $ts->setAvailable(true);
        $ts->setTimeString(DateTime::createFromFormat('Y-m-d','2018-12-01'));
        $slots[] = $ts;
        $ts = new TimeSlot();
        $ts->setTimeSlot(1);
        $ts->setAvailable(true);
        $ts->setTimeString(DateTime::createFromFormat('Y-m-d','2018-12-02'));
        $slots[] = $ts;
        $ts = new TimeSlot();
        $ts->setTimeSlot(2);
        $ts->setAvailable(true);
        $ts->setTimeString(DateTime::createFromFormat('Y-m-d','2018-12-02'));
        $slots[] = $ts;
        $ts = new TimeSlot();
        $ts->setTimeSlot(3);
        $ts->setAvailable(true);
        $ts->setTimeString(DateTime::createFromFormat('Y-m-d','2018-12-02'));
        $slots[] = $ts;
        $ts = new TimeSlot();
        $ts->setTimeSlot(4);
        $ts->setAvailable(true);
        $ts->setTimeString(DateTime::createFromFormat('Y-m-d','2018-12-02'));
        $slots[] = $ts;
        $ts = new TimeSlot();
        $ts->setTimeSlot(5);
        $ts->setAvailable(true);
        $ts->setTimeString(DateTime::createFromFormat('Y-m-d','2018-12-02'));
        $slots[] = $ts;
        $ts = new TimeSlot();
        $ts->setTimeSlot(6);
        $ts->setAvailable(true);
        $ts->setTimeString(DateTime::createFromFormat('Y-m-d','2018-12-02'));
        $slots[] = $ts;
        $ts = new TimeSlot();
        $ts->setTimeSlot(7);
        $ts->setAvailable(false);
        $ts->setTimeString(DateTime::createFromFormat('Y-m-d','2018-12-02'));
        $slots[] = $ts;
        $ts = new TimeSlot();
        $ts->setTimeSlot(1);
        $ts->setAvailable(true);
        $ts->setTimeString(DateTime::createFromFormat('Y-m-d','2018-12-03'));
        $slots[] = $ts;
        $ts = new TimeSlot();
        $ts->setTimeSlot(2);
        $ts->setAvailable(true);
        $ts->setTimeString(DateTime::createFromFormat('Y-m-d','2018-12-03'));
        $slots[] = $ts;
        $ts = new TimeSlot();
        $ts->setTimeSlot(3);
        $ts->setAvailable(true);
        $ts->setTimeString(DateTime::createFromFormat('Y-m-d','2018-12-03'));
        $slots[] = $ts;
        $ts = new TimeSlot();
        $ts->setTimeSlot(4);
        $ts->setAvailable(true);
        $ts->setTimeString(DateTime::createFromFormat('Y-m-d','2018-12-03'));
        $slots[] = $ts;
        $ts = new TimeSlot();
        $ts->setTimeSlot(5);
        $ts->setAvailable(true);
        $ts->setTimeString(DateTime::createFromFormat('Y-m-d','2018-12-03'));
        $slots[] = $ts;
        $ts = new TimeSlot();
        $ts->setTimeSlot(6);
        $ts->setAvailable(true);
        $ts->setTimeString(DateTime::createFromFormat('Y-m-d','2018-12-03'));
        $slots[] = $ts;
        $ts = new TimeSlot();
        $ts->setTimeSlot(7);
        $ts->setAvailable(true);
        $ts->setTimeString(DateTime::createFromFormat('Y-m-d','2018-12-03'));
        $slots[] = $ts;
        $ts = new TimeSlot();
        $ts->setTimeSlot(1);
        $ts->setAvailable(true);
        $ts->setTimeString(DateTime::createFromFormat('Y-m-d','2018-12-04'));
        $slots[] = $ts;
        $ts = new TimeSlot();
        $ts->setTimeSlot(2);
        $ts->setAvailable(true);
        $ts->setTimeString(DateTime::createFromFormat('Y-m-d','2018-12-04'));
        $slots[] = $ts;
        $ts = new TimeSlot();
        $ts->setTimeSlot(3);
        $ts->setAvailable(true);
        $ts->setTimeString(DateTime::createFromFormat('Y-m-d','2018-12-04'));
        $slots[] = $ts;
        $ts = new TimeSlot();
        $ts->setTimeSlot(4);
        $ts->setAvailable(true);
        $ts->setTimeString(DateTime::createFromFormat('Y-m-d','2018-12-04'));
        $slots[] = $ts;
        $ts = new TimeSlot();
        $ts->setTimeSlot(5);
        $ts->setAvailable(true);
        $ts->setTimeString(DateTime::createFromFormat('Y-m-d','2018-12-04'));
        $slots[] = $ts;
        $ts = new TimeSlot();
        $ts->setTimeSlot(6);
        $ts->setAvailable(true);
        $ts->setTimeString(DateTime::createFromFormat('Y-m-d','2018-12-04'));
        $slots[] = $ts;
        $ts = new TimeSlot();
        $ts->setTimeSlot(7);
        $ts->setAvailable(true);
        $ts->setTimeString(DateTime::createFromFormat('Y-m-d','2018-12-04'));
        $slots[] = $ts;
        $ts = new TimeSlot();
        $ts->setTimeSlot(1);
        $ts->setAvailable(true);
        $ts->setTimeString(DateTime::createFromFormat('Y-m-d','2018-12-05'));
        $slots[] = $ts;
        $ts = new TimeSlot();
        $ts->setTimeSlot(2);
        $ts->setAvailable(true);
        $ts->setTimeString(DateTime::createFromFormat('Y-m-d','2018-12-05'));
        $slots[] = $ts;
        $ts = new TimeSlot();
        $ts->setTimeSlot(3);
        $ts->setAvailable(true);
        $ts->setTimeString(DateTime::createFromFormat('Y-m-d','2018-12-05'));
        $slots[] = $ts;
        $ts = new TimeSlot();
        $ts->setTimeSlot(4);
        $ts->setAvailable(true);
        $ts->setTimeString(DateTime::createFromFormat('Y-m-d','2018-12-05'));
        $slots[] = $ts;
        $ts = new TimeSlot();
        $ts->setTimeSlot(5);
        $ts->setAvailable(true);
        $ts->setTimeString(DateTime::createFromFormat('Y-m-d','2018-12-05'));
        $slots[] = $ts;
        $ts = new TimeSlot();
        $ts->setTimeSlot(6);
        $ts->setAvailable(true);
        $ts->setTimeString(DateTime::createFromFormat('Y-m-d','2018-12-05'));
        $slots[] = $ts;
        $ts = new TimeSlot();
        $ts->setTimeSlot(7);
        $ts->setAvailable(true);
        $ts->setTimeString(DateTime::createFromFormat('Y-m-d','2018-12-05'));
        $slots[] = $ts;

        return $slots;
    }

    public function setupTimeSlotsChangeYear() : array
    {
        $slots = [];

        $ts = new TimeSlot();
        $ts->setTimeSlot(1);
        $ts->setAvailable(true);
        $ts->setTimeString(DateTime::createFromFormat('Y-m-d','2018-12-30'));
        $slots[] = $ts;
        $ts = new TimeSlot();
        $ts->setTimeSlot(2);
        $ts->setAvailable(false);
        $ts->setTimeString(DateTime::createFromFormat('Y-m-d','2018-12-30'));
        $slots[] = $ts;
        $ts = new TimeSlot();
        $ts->setTimeSlot(3);
        $ts->setAvailable(true);
        $ts->setTimeString(DateTime::createFromFormat('Y-m-d','2018-12-30'));
        $slots[] = $ts;
        $ts = new TimeSlot();
        $ts->setTimeSlot(4);
        $ts->setAvailable(false);
        $ts->setTimeString(DateTime::createFromFormat('Y-m-d','2018-12-30'));
        $slots[] = $ts;
        $ts = new TimeSlot();
        $ts->setTimeSlot(5);
        $ts->setAvailable(false);
        $ts->setTimeString(DateTime::createFromFormat('Y-m-d','2018-12-30'));
        $slots[] = $ts;
        $ts = new TimeSlot();
        $ts->setTimeSlot(6);
        $ts->setAvailable(true);
        $ts->setTimeString(DateTime::createFromFormat('Y-m-d','2018-12-30'));
        $slots[] = $ts;
        $ts = new TimeSlot();
        $ts->setTimeSlot(7);
        $ts->setAvailable(true);
        $ts->setTimeString(DateTime::createFromFormat('Y-m-d','2018-12-30'));
        $slots[] = $ts;
        $ts = new TimeSlot();
        $ts->setTimeSlot(1);
        $ts->setAvailable(true);
        $ts->setTimeString(DateTime::createFromFormat('Y-m-d','2018-12-31'));
        $slots[] = $ts;
        $ts = new TimeSlot();
        $ts->setTimeSlot(2);
        $ts->setAvailable(true);
        $ts->setTimeString(DateTime::createFromFormat('Y-m-d','2018-12-31'));
        $slots[] = $ts;
        $ts = new TimeSlot();
        $ts->setTimeSlot(3);
        $ts->setAvailable(false);
        $ts->setTimeString(DateTime::createFromFormat('Y-m-d','2018-12-31'));
        $slots[] = $ts;
        $ts = new TimeSlot();
        $ts->setTimeSlot(4);
        $ts->setAvailable(false);
        $ts->setTimeString(DateTime::createFromFormat('Y-m-d','2018-12-31'));
        $slots[] = $ts;
        $ts = new TimeSlot();
        $ts->setTimeSlot(5);
        $ts->setAvailable(false);
        $ts->setTimeString(DateTime::createFromFormat('Y-m-d','2018-12-31'));
        $slots[] = $ts;
        $ts = new TimeSlot();
        $ts->setTimeSlot(6);
        $ts->setAvailable(true);
        $ts->setTimeString(DateTime::createFromFormat('Y-m-d','2018-12-31'));
        $slots[] = $ts;
        $ts = new TimeSlot();
        $ts->setTimeSlot(7);
        $ts->setAvailable(true);
        $ts->setTimeString(DateTime::createFromFormat('Y-m-d','2018-12-31'));
        $slots[] = $ts;
        $ts = new TimeSlot();
        $ts->setTimeSlot(1);
        $ts->setAvailable(true);
        $ts->setTimeString(DateTime::createFromFormat('Y-m-d','2019-01-01'));
        $slots[] = $ts;
        $ts = new TimeSlot();
        $ts->setTimeSlot(2);
        $ts->setAvailable(true);
        $ts->setTimeString(DateTime::createFromFormat('Y-m-d','2019-01-01'));
        $slots[] = $ts;
        $ts = new TimeSlot();
        $ts->setTimeSlot(3);
        $ts->setAvailable(true);
        $ts->setTimeString(DateTime::createFromFormat('Y-m-d','2019-01-01'));
        $slots[] = $ts;
        $ts = new TimeSlot();
        $ts->setTimeSlot(4);
        $ts->setAvailable(true);
        $ts->setTimeString(DateTime::createFromFormat('Y-m-d','2019-01-01'));
        $slots[] = $ts;
        $ts = new TimeSlot();
        $ts->setTimeSlot(5);
        $ts->setAvailable(true);
        $ts->setTimeString(DateTime::createFromFormat('Y-m-d','2019-01-01'));
        $slots[] = $ts;
        $ts = new TimeSlot();
        $ts->setTimeSlot(6);
        $ts->setAvailable(true);
        $ts->setTimeString(DateTime::createFromFormat('Y-m-d','2019-01-01'));
        $slots[] = $ts;
        $ts = new TimeSlot();
        $ts->setTimeSlot(7);
        $ts->setAvailable(true);
        $ts->setTimeString(DateTime::createFromFormat('Y-m-d','2019-01-01'));
        $slots[] = $ts;
        $ts = new TimeSlot();
        $ts->setTimeSlot(1);
        $ts->setAvailable(true);
        $ts->setTimeString(DateTime::createFromFormat('Y-m-d','2019-01-02'));
        $slots[] = $ts;
        $ts = new TimeSlot();
        $ts->setTimeSlot(2);
        $ts->setAvailable(true);
        $ts->setTimeString(DateTime::createFromFormat('Y-m-d','2019-01-02'));
        $slots[] = $ts;
        $ts = new TimeSlot();
        $ts->setTimeSlot(3);
        $ts->setAvailable(true);
        $ts->setTimeString(DateTime::createFromFormat('Y-m-d','2019-01-02'));
        $slots[] = $ts;
        $ts = new TimeSlot();
        $ts->setTimeSlot(4);
        $ts->setAvailable(true);
        $ts->setTimeString(DateTime::createFromFormat('Y-m-d','2019-01-02'));
        $slots[] = $ts;
        $ts = new TimeSlot();
        $ts->setTimeSlot(5);
        $ts->setAvailable(true);
        $ts->setTimeString(DateTime::createFromFormat('Y-m-d','2019-01-02'));
        $slots[] = $ts;
        $ts = new TimeSlot();
        $ts->setTimeSlot(6);
        $ts->setAvailable(true);
        $ts->setTimeString(DateTime::createFromFormat('Y-m-d','2019-01-02'));
        $slots[] = $ts;
        $ts = new TimeSlot();
        $ts->setTimeSlot(7);
        $ts->setAvailable(false);
        $ts->setTimeString(DateTime::createFromFormat('Y-m-d','2019-01-02'));
        $slots[] = $ts;
        $ts = new TimeSlot();
        $ts->setTimeSlot(1);
        $ts->setAvailable(true);
        $ts->setTimeString(DateTime::createFromFormat('Y-m-d','2019-01-03'));
        $slots[] = $ts;
        $ts = new TimeSlot();
        $ts->setTimeSlot(2);
        $ts->setAvailable(true);
        $ts->setTimeString(DateTime::createFromFormat('Y-m-d','2019-01-03'));
        $slots[] = $ts;
        $ts = new TimeSlot();
        $ts->setTimeSlot(3);
        $ts->setAvailable(true);
        $ts->setTimeString(DateTime::createFromFormat('Y-m-d','2019-01-03'));
        $slots[] = $ts;
        $ts = new TimeSlot();
        $ts->setTimeSlot(4);
        $ts->setAvailable(true);
        $ts->setTimeString(DateTime::createFromFormat('Y-m-d','2019-01-03'));
        $slots[] = $ts;
        $ts = new TimeSlot();
        $ts->setTimeSlot(5);
        $ts->setAvailable(true);
        $ts->setTimeString(DateTime::createFromFormat('Y-m-d','2019-01-03'));
        $slots[] = $ts;
        $ts = new TimeSlot();
        $ts->setTimeSlot(6);
        $ts->setAvailable(true);
        $ts->setTimeString(DateTime::createFromFormat('Y-m-d','2019-01-03'));
        $slots[] = $ts;
        $ts = new TimeSlot();
        $ts->setTimeSlot(7);
        $ts->setAvailable(true);
        $ts->setTimeString(DateTime::createFromFormat('Y-m-d','2019-01-03'));
        $slots[] = $ts;
        $ts = new TimeSlot();
        $ts->setTimeSlot(1);
        $ts->setAvailable(true);
        $ts->setTimeString(DateTime::createFromFormat('Y-m-d','2019-01-04'));
        $slots[] = $ts;
        $ts = new TimeSlot();
        $ts->setTimeSlot(2);
        $ts->setAvailable(true);
        $ts->setTimeString(DateTime::createFromFormat('Y-m-d','2019-01-04'));
        $slots[] = $ts;
        $ts = new TimeSlot();
        $ts->setTimeSlot(3);
        $ts->setAvailable(true);
        $ts->setTimeString(DateTime::createFromFormat('Y-m-d','2019-01-04'));
        $slots[] = $ts;
        $ts = new TimeSlot();
        $ts->setTimeSlot(4);
        $ts->setAvailable(true);
        $ts->setTimeString(DateTime::createFromFormat('Y-m-d','2019-01-04'));
        $slots[] = $ts;
        $ts = new TimeSlot();
        $ts->setTimeSlot(5);
        $ts->setAvailable(true);
        $ts->setTimeString(DateTime::createFromFormat('Y-m-d','2019-01-04'));
        $slots[] = $ts;
        $ts = new TimeSlot();
        $ts->setTimeSlot(6);
        $ts->setAvailable(true);
        $ts->setTimeString(DateTime::createFromFormat('Y-m-d','2019-01-04'));
        $slots[] = $ts;
        $ts = new TimeSlot();
        $ts->setTimeSlot(7);
        $ts->setAvailable(true);
        $ts->setTimeString(DateTime::createFromFormat('Y-m-d','2019-01-04'));
        $slots[] = $ts;
        $ts = new TimeSlot();
        $ts->setTimeSlot(1);
        $ts->setAvailable(true);
        $ts->setTimeString(DateTime::createFromFormat('Y-m-d','2019-01-05'));
        $slots[] = $ts;
        $ts = new TimeSlot();
        $ts->setTimeSlot(2);
        $ts->setAvailable(true);
        $ts->setTimeString(DateTime::createFromFormat('Y-m-d','2019-01-05'));
        $slots[] = $ts;
        $ts = new TimeSlot();
        $ts->setTimeSlot(3);
        $ts->setAvailable(true);
        $ts->setTimeString(DateTime::createFromFormat('Y-m-d','2019-01-05'));
        $slots[] = $ts;
        $ts = new TimeSlot();
        $ts->setTimeSlot(4);
        $ts->setAvailable(true);
        $ts->setTimeString(DateTime::createFromFormat('Y-m-d','2019-01-05'));
        $slots[] = $ts;
        $ts = new TimeSlot();
        $ts->setTimeSlot(5);
        $ts->setAvailable(true);
        $ts->setTimeString(DateTime::createFromFormat('Y-m-d','2019-01-05'));
        $slots[] = $ts;
        $ts = new TimeSlot();
        $ts->setTimeSlot(6);
        $ts->setAvailable(true);
        $ts->setTimeString(DateTime::createFromFormat('Y-m-d','2019-01-05'));
        $slots[] = $ts;
        $ts = new TimeSlot();
        $ts->setTimeSlot(7);
        $ts->setAvailable(true);
        $ts->setTimeString(DateTime::createFromFormat('Y-m-d','2019-01-05'));
        $slots[] = $ts;

        return $slots;
    }
}
