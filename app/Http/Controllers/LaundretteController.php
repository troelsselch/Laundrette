<?php

namespace App\Http\Controllers;

use App\Adapters\GuzzleAdapter;
use App\Models\MachineState;
use App\Models\Reservation;
use App\Models\Transaction;
use App\Parsers\BookingMainParser;
use App\Parsers\BookingCalendarParser;
use App\Parsers\LoadBalanceBalanceParser;
use App\Parsers\CurrentMachineStateParser;
use App\Parsers\LoadBalanceNextButtonParser;
use App\Parsers\VersionParser;
use App\Parsers\LoadBalanceTransactionsParser;
use Illuminate\View\View;

class LaundretteController extends Controller
{
    const PATH_DEFAULT = 'Default.aspx';
    const PATH_BOOKING = 'Booking/BookingMain.aspx';
    const PATH_BALANCE = 'ELS_DEB/LoadBalance.aspx';
    const PATH_MACHINE_STATE = 'Machine/MachineGroupStat.aspx';
    const PATH_BOOKING_CALENDAR = 'Booking/BookingCalendar.aspx';

    /** @var GuzzleAdapter */
    private $adapter;

    public function __construct(GuzzleAdapter $adapter)
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
        /** @var Transaction[] $data */
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

    /**
     * @return MachineState[]
     */
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

    public function index() : View
    {
        // return dashboard
    }

    public function renderMachineStateAndReservations() : View
    {
        $machineStates = $this->getMachineStates();
        $reservations = $this->getReservations();
        $bookings = [1 => [], 2 => [], 3 => []];
        /** @var Reservation $reservation */
        foreach ($reservations as $reservation) {
            $bookings[$reservation->getMachine()->getId()][] = $reservation;
        }

        return view('machine_state', [
            'machineStates' => $machineStates,
            'bookings'      => $bookings,
        ]);
    }

    public function components() : View
    {
//        return $this->renderMachineStateAndReservations();
        $balance = $this->getBalance();
        $version = $this->getVersion();

        return view('components', [
            'balance' => $balance,
            'version' => $version,
        ]);
    }
}
