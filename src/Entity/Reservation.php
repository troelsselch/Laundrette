<?php

namespace Laundrette\Entity;

class Reservation {
  // Start time. End time will be 2 hours later.
  private $datetime;
  private $machine;

  public function __construct(DateTime $datetime, Machine $machine) {
    $this->datetime = clone $datetime;
    $this->machine = clone $machine;
  }
}
