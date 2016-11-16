<?php

namespace Laundrette\Parser;

use \DateTime;
use \Laundrette\Entity\Machine;
use \Laundrette\Entity\Transaction;

class LoadBalanceParser extends LaundretteParser
{
  const ROW_DATE = 0;
  const ROW_TIME = 1;
  const ROW_MACHINE = 2;
  const ROW_AMOUNT = 3;

  public function parse($html)
  {
    $dom = $this->loadDOM($html);

    // Get balance.
    $element = $dom->getElementById(self::PREFIX . 'lbCurrentBalance');
    // TODO: error handling.
    $balanceRaw = $element->nodeValue;
    $balanceRaw = explode(':', $balanceRaw);
    $balance = trim($balanceRaw[1]);

    // Get transactions.
    // Contains a simple table.
    $element = $dom->getElementById(self::PREFIX . 'pnLoadBalance');

    $table = NULL;
    // Locate the table node.
    foreach ($element->childNodes as $childNode) {
      if (get_class($childNode) == 'DOMElement'
        && $childNode->tagName == 'table') {
        $table = $childNode;
        break;
      }
    }

    $transactions = array();
    if (isset($table)) {
      foreach ($table->childNodes as $tr) {
        if (!empty($tr->childNodes)) {
          $row = array();
          foreach ($tr->childNodes as $childNode) {
            if (get_class($childNode) != 'DOMElement') {
              continue;
            }
            $row[] = trim($childNode->nodeValue);
          }
          // Do not include header.
          if (strtolower($row[0]) == 'dato') {
            continue;
          }

          $dateString = $row[self::ROW_DATE] . ' ' . $row[self::ROW_TIME];
          $date = DateTime::createFromFormat('Y-m-d H:i:s', $dateString);

          $machine = new Machine($row[self::ROW_MACHINE]);

          // String to integer, e.g. "28.46" to 2846.
          $amount = floatval($row[self::ROW_AMOUNT]) * 100;

          $transactions[] = new Transaction($date, $machine, $amount);
        }
      }
    }

    return array(
      'balance' => $balance,
      'transactions' => $transactions,
    );
  }
}
