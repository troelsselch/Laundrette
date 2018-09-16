<?php

namespace App\Parsers;

use DOMDocument;

abstract class LaundretteParser
{
    /** @var string Prefix used by all variables. */
    const PREFIX = '_ctl0_ContentPlaceHolder1_';

    protected $dom;

    protected $html;

    public function __construct(string $html)
    {
        $this->html = $html;
        $this->dom = $this->loadDOM($html);
    }

    protected function loadDOM($html): DOMDocument
    {
        $dom = new DOMDocument();
        // Silence warnings. The status page has multiple divs with the same id
        // (imgExpand).
        @$dom->loadHTML($html);
        $dom->preserveWhiteSpace = false;

        return $dom;
    }

    protected function saveHtml() : string
    {
        $fileName = md5($this->html) . '.html';
        file_put_contents($fileName, $this->html);
        return $fileName;
    }

    abstract public function parse();
}
