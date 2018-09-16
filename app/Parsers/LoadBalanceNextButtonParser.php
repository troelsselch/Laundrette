<?php

namespace App\Parsers;


class LoadBalanceNextButtonParser extends LaundretteParser
{

    public function parse()
    {
        $nextButtonId = LaundretteParser::PREFIX . 'hlNext';
        $button = $this->dom->getElementById($nextButtonId);
        $hasMore = empty($button->getAttribute('disabled'));

        return $hasMore;
    }
}
