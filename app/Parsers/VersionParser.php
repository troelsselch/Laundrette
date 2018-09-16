<?php

namespace App\Parsers;

class VersionParser extends LaundretteParser
{

    public function parse()
    {
        $versionId = '_ctl0_lbVersion';

        $element = $this->dom->getElementById($versionId);

        $matches = [];
        preg_match('([0-9\.]+)', $element->nodeValue, $matches);

        return !empty($matches) ? $matches[0] : 0;
    }
}
