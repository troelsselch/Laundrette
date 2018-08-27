<?php

namespace Laundrette\Parser;

use DOMElement;
use Exception;

class LoadBalanceBalanceParser extends LaundretteParser
{

    const ROW_DATE = 0;
    const ROW_TIME = 1;
    const ROW_MACHINE = 2;
    const ROW_AMOUNT = 3;

    public function parse()
    {
        return $this->getBalance();
    }

    private function getBalance() : float
    {
        $element = $this->dom->getElementById(self::PREFIX . 'lbCurrentBalance');

        if (!$element instanceof DOMElement) {
            $fileName = $this->saveHtml();
            $message = sprintf('Current balance not found in file %s', getcwd() . '/' . $fileName);
            throw new Exception($message);
        }

        $balanceRaw = explode(':', $element->nodeValue);
        return (float) trim($balanceRaw[1]);
    }
}
