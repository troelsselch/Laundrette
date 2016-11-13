<?php

namespace Laundrette\Api;

class Laundrette {
  private $adapter;

  public function __construct(AdapterInterface $adapter) {
    $this->adapter = $adapter;
  }

  public function getReservations() {
    $path = 'Booking/BookingMain.aspx';
    $html = $this->adapter->call($path);

    $parser = new BookingMainParser();
    $data = $parser->parse($html);

    return $data;
  }

  public function getBalance() {
    $data = getBalanceAndTransactions();

    $balance = $data['balance'];

    return $balance;
  }

  public function getTransactions() {
    $data = getBalanceAndTransactions();

    $transactions = $data['transactions'];

    return $transactions;
  }

  public function getBalanceAndTransactions() {
    $path = 'ELS_DEB/LoadBalance.aspx';
    $html = $this->adapter->call($path);

    $parser = new LoadBalanceParser();
    $data = $parser->parse($html);

    return $data;
  }

  public function getMachineStates() {
    $path = 'Machine/MachineGroupStat.aspx';
    $html = $this->adapter->call($path);

    $parser = new MachineGroupStatParser();
    $data = $parser->parse($html);

    return $data;
  }
}
