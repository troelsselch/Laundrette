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

  public function __toString() {
    return sprintf('%s: %s, Booked by me=%s, Available=%s',
      get_class(),
      $this->machine,
      $this->booked_by_me ? 'Yes' : 'No',
      $this->available ? 'Yes' : 'No'
    );
  }
}
