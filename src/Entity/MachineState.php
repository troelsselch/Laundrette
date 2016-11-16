<?php

namespace Laundrette\Entity;

class MachineState
{
  private $_machine;
  private $_bookedByMe;
  private $_available;

  public function __construct(Machine $machine, bool $bookedByMe,
    bool $available)
  {
    $this->_machine = $machine;
    $this->_bookedByMe = $bookedByMe;
    $this->_available = $available;
  }

  public function __toString()
  {
    return sprintf(
        '%s: %s, Booked by me=%s, Available=%s',
        get_class(),
        $this->_machine,
        $this->_bookedByMe ? 'Yes' : 'No',
        $this->_available ? 'Yes' : 'No'
    );
  }
}
