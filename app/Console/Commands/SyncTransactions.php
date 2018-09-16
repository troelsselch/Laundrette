<?php

namespace App\Console\Commands;

use App\Http\Controllers\LaundretteController;
use Illuminate\Console\Command;

class SyncTransactions extends Command
{
    protected $signature = 'sync:transactions';

    protected $description = 'Sync transactions to local database.';

    public function handle() : void
    {
        /** @var LaundretteController $laundrette */
        $laundrette = app(LaundretteController::class);
        $transactions = $laundrette->getTransactions();

        foreach ($transactions as $transaction) {
            // todo save, if unique
            print $transaction;
            print PHP_EOL;
        }
    }
}
