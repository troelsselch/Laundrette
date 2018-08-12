<?php

namespace Laundrette\Entity;

class Machine
{

    private $name;

    // Text, such as "TØR 4 Klar ca: 20:18"
    private $state;

    public function __construct($name, $state = '')
    {
        $this->name = $name;
        $this->state = $state;
    }

    public function __toString()
    {
        return sprintf(
            '%s: %s, %s',
            get_class(),
            $this->name,
            $this->state
        );
    }
}
