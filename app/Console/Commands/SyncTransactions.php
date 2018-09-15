<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class SyncTransactions extends Command
{
    protected $signature = 'sync:transactions';

    protected $description = 'Sync transactions to local database.';

    public function handle() : void
    {
        print "Template\n";
    }
}
