<?php

namespace App\Repositories;

use App\Models\Transaction;
use Doctrine\ORM\EntityRepository;

class TransactionRepository extends EntityRepository
{
    public function persist(Transaction $transaction) : void
    {
        $this->_em->persist($transaction);
    }

    public function flush() : void
    {
        $this->_em->flush();
    }
}
