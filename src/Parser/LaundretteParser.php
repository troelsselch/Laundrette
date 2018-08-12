<?php

namespace Laundrette\Parser;

use \DOMDocument;

abstract class LaundretteParser
{

    /**
     * @var PREFIX
     *
     * Prefix used by all variables.
     */
    const PREFIX = '_ctl0_ContentPlaceHolder1_';

    /**
     * Helper function to load the DOM from an HTML string.
     *
     * @param string $html
     *   String of HTML from a curl response or file read.
     *
     * @return DOMDocument
     *   DOMDocument from the HTML.
     */
    protected function loadDOM($html)
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
