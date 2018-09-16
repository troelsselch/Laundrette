<?php

namespace App\Providers;

use App\Adapters\AdapterInterface;
use App\Adapters\GuzzleAdapter;
use App\Models\Machine;
use App\Models\Transaction;
use App\Repositories\MachineRepository;
use App\Repositories\TransactionRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(AdapterInterface::class, function () {
            return new GuzzleAdapter(
                env('LAUNDRETTE_URL'),
                env('LAUNDRETTE_USERNAME'),
                env('LAUNDRETTE_PASSWORD')
            );
        });

        $this->app->bind(MachineRepository::class, function ($app) {
            return new MachineRepository(
                $app['em'],
                $app['em']->getClassMetadata(Machine::class)
            );
        });

        $this->app->bind(TransactionRepository::class, function ($app) {
            return new TransactionRepository(
                $app['em'],
                $app['em']->getClassMetadata(Transaction::class)
            );
        });
    }
}
