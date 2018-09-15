<?php

namespace App\Console\Commands;

use App\Adapters\GuzzleAdapter;
use App\Http\Controllers\LaundretteController;
use Illuminate\Console\Command;

class SyncTransactions extends Command
{
    protected $signature = 'sync:transactions';

    protected $description = 'Sync transactions to local database.';

    public function handle() : void
    {
        $url = env('LAUNDRETTE_URL', '');
        $username = env('LAUNDRETTE_USERNAME', '');
        $password = env('LAUNDRETTE_PASSWORD', '');

        if (empty($url) || empty($username) || empty($password)) {
            $this->error('Missing url, username, and/or password configuration.');
            return;
        }

        $guzzle = new GuzzleAdapter($url, $username, $password);
        $laundrette = new LaundretteController($guzzle);
        $transactions = $laundrette->getTransactions();

        foreach ($transactions as $transaction) {
            // todo save, if unique
            print $transaction;
            print PHP_EOL;
        }
    }
}
