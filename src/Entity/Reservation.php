<?php

namespace Laundrette\Entity;

use \DateTime;

class Reservation {
  // Start time. End time will be 2 hours later.
  private $datetime;
  private $machine;

  public function __construct(DateTime $datetime, Machine $machine) {
    $this->datetime = clone $datetime;
    $this->machine = clone $machine;
  }

  public function __toString() {
    return sprintf('%s: %s, %s',
      get_class(),
      $this->datetime->format('Y-m-d H:i:s'),
      $this->machine
    );
  }
}
