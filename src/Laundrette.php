<?php

namespace Laundrette;

use Laundrette\Adapter\AdapterInterface;
use Laundrette\Parser\BookingMainParser;
use Laundrette\Parser\LoadBalanceParser;
use Laundrette\Parser\MachineGroupStatParser;

class Laundrette
{
  private $_adapter;

  public function __construct(AdapterInterface $adapter)
  {
    $this->_adapter = $adapter;
  }

  public function getReservations()
  {
    $path = 'Booking/BookingMain.aspx';
    $html = $this->_adapter->call($path);

    $parser = new BookingMainParser();
    $data = $parser->parse($html);

    return $data;
  }

  public function getBalance()
  {
    $data = $this->getBalanceAndTransactions();

    $balance = $data['balance'];

    return $balance;
  }

  public function getTransactions()
  {
    $data = $this->getBalanceAndTransactions();

    $transactions = $data['transactions'];

    return $transactions;
  }

  public function getBalanceAndTransactions()
  {
    $path = 'ELS_DEB/LoadBalance.aspx';
    $html = $this->_adapter->call($path);

    $parser = new LoadBalanceParser();
    $data = $parser->parse($html);

    return $data;
  }

  public function getMachineStates()
  {
    $path = 'Machine/MachineGroupStat.aspx';
    $html = $this->_adapter->call($path);

    $parser = new MachineGroupStatParser();
    $data = $parser->parse($html);

    return $data;
  }

  public function close()
  {
    $this->adapter->close();
  }
}
