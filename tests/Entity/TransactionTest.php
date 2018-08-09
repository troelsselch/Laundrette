<?php

namespace Laundrette\Test\Entity;

use DateTime;
use Laundrette\Entity\Machine;
use Laundrette\Entity\Transaction;
use Laundrette\Test\TestCase;

class TransactionTest extends TestCase
{

    public function testCanCreateAndToString(): void
    {
        $machine = new Machine('Example', 'State');
        $dt = DateTime::createFromFormat('Y-m-d', '2018-06-06');
        $transaction = new Transaction($dt, $machine, 42);
        $this->assertEquals(
            sprintf('Laundrette\Entity\Transaction: %s, Laundrette\Entity\Machine: Example, State, 42', $dt->format('Y-m-d H:i:s')),
            (string)$transaction
        );
    }
}
