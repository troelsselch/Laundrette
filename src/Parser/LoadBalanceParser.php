<?php

namespace Laundrette\Parser;

use DateTime;
use DOMElement;
use Exception;
use Laundrette\Entity\Machine;
use Laundrette\Entity\Transaction;

class LoadBalanceParser extends LaundretteParser
{

    const ROW_DATE = 0;
    const ROW_TIME = 1;
    const ROW_MACHINE = 2;
    const ROW_AMOUNT = 3;

    public function parse()
    {
        $data = [];

        $data['balance'] = $this->getBalance();
        $data['transactions'] = $this->getTransactions();

        return $data;
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

    private function getTransactions() : array
    {
        $transactions = [];

        // Contains a simple table.
        $element = $this->dom->getElementById(self::PREFIX . 'pnLoadBalance');
        if (!$element instanceof DOMElement) {
            $fileName = $this->saveHtml();
            $message = sprintf('Load balance not found in file %s', getcwd() . '/' . $fileName);
            throw new Exception($message);
        }

        $table = null;
        // Locate the table node.
        foreach ($element->childNodes as $childNode) {
            if ($childNode instanceof DOMElement
                && $childNode->tagName == 'table') {
                $table = $childNode;
                break;
            }
        }

        if (isset($table)) {
            foreach ($table->childNodes as $tr) {
                if (!empty($tr->childNodes)) {
                    $row = [];
                    foreach ($tr->childNodes as $childNode) {
                        if (!$childNode instanceof DOMElement) {
                            continue;
                        }
                        $row[] = trim($childNode->nodeValue);
                    }
                    // Do not include header.
                    if (strtolower($row[0]) == 'dato') {
                        continue;
                    }

                    $date = DateTime::createFromFormat(
                        'Y-m-d H:i:s',
                        $row[self::ROW_DATE] . ' ' . $row[self::ROW_TIME]
                    );

                    $machine = Machine::createFromString($row[self::ROW_MACHINE]);

                    // String to integer, e.g. "28.46" to 2846.
                    $amount = floatval($row[self::ROW_AMOUNT]) * 100;

                    $transactions[] = new Transaction($date, $machine, $amount);
                }
            }
        }

        return $transactions;
    }
}
