<?php

namespace Laundrette\Parser;

use \DOMDocument;

abstract class LaundretteParser
{

    /** @var string Prefix used by all variables. */
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

    protected function saveHtml($html) : string
    {
        $fileName = md5($html) . '.html';
        file_put_contents($fileName, $html);
        return $fileName;
    }

    abstract public function parse($html);
}
