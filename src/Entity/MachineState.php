<?php

namespace Laundrette\Entity;

class MachineState {

  private $machine;
  private $booked_by_me;
  private $available;

  public function __construct(Machine $machine, bool $booked_by_me, bool $available) {
    $this->machine = $machine;
    $this->booked_by_me = $booked_by_me;
    $this->available = $available;
  }
}
