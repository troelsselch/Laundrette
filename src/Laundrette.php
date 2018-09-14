<?php

namespace Laundrette;

use Laundrette\Adapter\AdapterInterface;
use Laundrette\Parser\BookingMainParser;
use Laundrette\Parser\BookingCalendarParser;
use Laundrette\Parser\LoadBalanceBalanceParser;
use Laundrette\Parser\CurrentMachineStateParser;
use Laundrette\Parser\VersionParser;
use Laundrette\Parser\LoadBalanceTransactionsParser;

class Laundrette
{
    const PATH_DEFAULT = 'Default.aspx';
    const PATH_BOOKING = 'Booking/BookingMain.aspx';
    const PATH_BALANCE = 'ELS_DEB/LoadBalance.aspx';
    const PATH_MACHINE_STATE = 'Machine/MachineGroupStat.aspx';
    const PATH_BOOKING_CALENDAR = 'Booking/BookingCalendar.aspx';

    /** @var \Laundrette\Adapter\AdapterInterface */
    private $adapter;

    public function __construct(AdapterInterface $adapter)
    {
        $this->adapter = $adapter;
    }

    public function getReservations() : array
    {
        $html = $this->adapter->call(self::PATH_BOOKING);

        $parser = new BookingMainParser($html);
        $data = $parser->parse();

        return $data;
    }

    public function getBalance() : float
    {
        $html = $this->adapter->call(self::PATH_BALANCE);

        $parser = new LoadBalanceBalanceParser($html);
        $data = $parser->parse();

        return $data;
    }

    public function getTransactions() : array
    {
        $html = $this->adapter->call(self::PATH_BALANCE);

        $parser = new LoadBalanceTransactionsParser($html);
        $data = $parser->parse();

        return $data;
    }

    public function getMachineStates() : array
    {
        $html = $this->adapter->call(self::PATH_MACHINE_STATE);

        $parser = new CurrentMachineStateParser($html);
        $data = $parser->parse();

        return $data;
    }

    public function getBookingCalendar() : array
    {
        $html = $this->adapter->call(self::PATH_BOOKING_CALENDAR);

        $parser = new BookingCalendarParser($html);
        $data = $parser->parse();

        return $data;
    }

    public function getVersion() : string
    {
        $html = $this->adapter->call(self::PATH_DEFAULT);

        $parser = new VersionParser($html);
        $version = $parser->parse();

        return $version;
    }
}
