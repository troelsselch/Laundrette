<?php

namespace Tests\Models;

use DateTime;
use App\Models\Machine;
use App\Models\Transaction;
use Tests\TestCase;

class TransactionTest extends TestCase
{

    public function testCanCreateAndToString(): void
    {
        $machine = new Machine('Example');
        $dt = DateTime::createFromFormat('Y-m-d', '2018-06-06');
        $transaction = new Transaction($dt, $machine, 42);
        $this->assertEquals(
            sprintf(
                'Transaction: %s, (Machine: Example), 42',
                $dt->format('Y-m-d H:i')
            ),
            (string)$transaction
        );
    }
}
