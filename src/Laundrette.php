<?php

namespace Laundrette;

use Laundrette\Adapter\AdapterInterface;
use Laundrette\Parser\BookingMainParser;
use Laundrette\Parser\LoadBalanceParser;
use Laundrette\Parser\CurrentMachineStateParser;

class Laundrette
{
    const PATH_BOOKING = 'Booking/BookingMain.aspx';

    const PATH_BALANCE = 'ELS_DEB/LoadBalance.aspx';

    const PATH_MACHINE_STATE = 'Machine/MachineGroupStat.aspx';

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
        $data = $this->getBalanceAndTransactions();

        return $data['balance'];
    }

    public function getTransactions() : array
    {
        $data = $this->getBalanceAndTransactions();

        $transactions = $data['transactions'];

        return $transactions;
    }

    public function getBalanceAndTransactions() : array
    {
        $html = $this->adapter->call(self::PATH_BALANCE);

        $parser = new LoadBalanceParser($html);
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
}
