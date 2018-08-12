<?php

namespace Laundrette\Parser;

use \DOMDocument;

abstract class LaundretteParser
{

    /** @var PREFIX Prefix used by all variables. */
    const PREFIX = '_ctl0_ContentPlaceHolder1_';

    protected function loadDOM($html): DOMDocument
    {
        $dom = new DOMDocument();
        // Silence warnings. The status page has multple divs with the same id
        // (imgExpand).
        @$dom->loadHTML($html);
        $dom->preserveWhiteSpace = false;

        return $dom;
    }

    abstract public function parse($html);
}
