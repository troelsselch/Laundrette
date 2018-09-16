<?php

namespace App\Http\Controllers;

use App\Adapters\AdapterInterface;
use App\Parsers\BookingMainParser;
use App\Parsers\BookingCalendarParser;
use App\Parsers\LaundretteParser;
use App\Parsers\LoadBalanceBalanceParser;
use App\Parsers\CurrentMachineStateParser;
use App\Parsers\LoadBalanceNextButtonParser;
use App\Parsers\VersionParser;
use App\Parsers\LoadBalanceTransactionsParser;

class LaundretteController
{
    const PATH_DEFAULT = 'Default.aspx';
    const PATH_BOOKING = 'Booking/BookingMain.aspx';
    const PATH_BALANCE = 'ELS_DEB/LoadBalance.aspx';
    const PATH_MACHINE_STATE = 'Machine/MachineGroupStat.aspx';
    const PATH_BOOKING_CALENDAR = 'Booking/BookingCalendar.aspx';

    /** @var \App\Adapters\AdapterInterface */
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
        $data = [];

        $callData = [];
        do {
            $html = $this->adapter->call(self::PATH_BALANCE, $callData);
            $parser = new LoadBalanceTransactionsParser($html);
            $new = $parser->parse();
            $data = array_merge($data, $new);

            $parser = new LoadBalanceNextButtonParser($html);
            $hasMore = $parser->parse();
            if ($hasMore) {
                // Set like this to trigger a POST request.
                $callData['__EVENTTARGET'] = '_ctl0$ContentPlaceHolder1$hlNext';
                // Avoid server overload.
                usleep(1000000);
            }
        } while ($hasMore);

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
