<?php

namespace App\Console\Commands;

use App\Http\Controllers\LaundretteController;
use App\Models\Transaction;
use App\Repositories\TransactionRepository;
use Illuminate\Console\Command;

class SyncTransactions extends Command
{
    protected $signature = 'sync:transactions';

    protected $description = 'Sync transactions to local database.';

    public function handle(TransactionRepository $repository) : void
    {
        /** @var LaundretteController $laundrette */
        $laundrette = app(LaundretteController::class);
        $transactions = $laundrette->getTransactions();

        /** @var Transaction $transaction */
        foreach ($transactions as $transaction) {
            // todo save, if unique
            print $transaction;
            print PHP_EOL;

            $exists = $repository->findOneBy([
                'datetime' => $transaction->getDatetime(),
                'machine'  => $transaction->getMachine(),
            ]);

            if (!$exists) {
                $repository->persist($transaction);
            }
        }

        $repository->flush();
    }
}
