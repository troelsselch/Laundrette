<?php

namespace App\Parsers;

use DateTime;
use DOMElement;
use DOMNodeList;
use Exception;
use App\Models\Machine;
use App\Models\Transaction;

class LoadBalanceTransactionsParser extends LaundretteParser
{

    const ROW_DATE = 0;
    const ROW_TIME = 1;
    const ROW_MACHINE = 2;
    const ROW_AMOUNT = 3;

    public function parse()
    {
        return $this->getTransactions();
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
                $transaction = $this->processRow($tr);
                if ($transaction) {
                    $transactions[] = $transaction;
                }

            }
        }

        return $transactions;
    }

    private function processRow(DOMElement $tr) : ?Transaction
    {
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
                return null;
            }

            $date = DateTime::createFromFormat(
                'Y-m-d H:i:s',
                $row[self::ROW_DATE] . ' ' . $row[self::ROW_TIME]
            );

            $machine = Machine::createFromString($row[self::ROW_MACHINE]);

            // String to integer, e.g. "28.46" to 2846.
            $amount = floatval($row[self::ROW_AMOUNT]) * 100;

            return new Transaction($date, $machine, $amount);
        }
    }
}
