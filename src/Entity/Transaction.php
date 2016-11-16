<?php

namespace Laundrette\Entity;

use \DateTime;

class Transaction
{
  private $_datetime;
  private $_machine;
  // Amount in 'ører'. (Never use double to represent money)
  private $_amount;

  public function __construct(DateTime $datetime, Machine $machine,
    int $amount)
  {
    // Datetime and Machine must not change for a given transaction, so we
    // clone them.
    $this->_datetime = clone $datetime;
    $this->_machine = clone $machine;
    $this->_amount = $amount;
  }

  public function __toString()
  {
    return sprintf(
        '%s: %s, %s, %s',
        get_class(),
        $this->_datetime->format('Y-m-d H:i:s'),
        $this->_machine,
        $this->_amount
    );
  }
}
