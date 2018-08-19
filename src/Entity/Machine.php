<?php

namespace Laundrette\Entity;

class Machine
{
    const REGEX = '([A-ZÆØÅ]+ [1-5])';

    private $name;

    public function __construct($name)
    {
        $this->name = $name;
    }

    public function getName() : string
    {
        return $this->name;
    }

    public function __toString()
    {
        return sprintf(
            '%s: %s',
            get_class(),
            $this->name
        );
    }

    public static function createFromString(string $string) : ?Machine
    {
        $matches = [];
        preg_match(self::REGEX, $string, $matches);

        return !empty($matches) ? new Machine($matches[0]) : null;
    }
}
