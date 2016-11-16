<?php

namespace Laundrette\Entity;

class Machine
{
  private $_name;
  // Text, such as "TØR 4 Klar ca: 20:18"
  private $_state;

  public function __construct($name, $state = '')
  {
    $this->_name = $name;
    $this->_state = $state;
  }

  public function __toString()
  {
    return sprintf(
        '%s: %s, %s',
        get_class(),
        $this->_name,
        $this->_state
    );
  }
}
