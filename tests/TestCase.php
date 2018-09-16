<?php

namespace Tests;

use GuzzleHttp\Client;
use Laravel\Lumen\Testing\TestCase as BaseTestCase;
use Mockery;

abstract class TestCase extends BaseTestCase
{
    public function setUp() : void
    {
        parent::setUp();

        $guzzleMock = Mockery::mock(Client::class);

        app()->bind(Client::class, function () use ($guzzleMock) {
            return $guzzleMock;
        });
    }

    /**
     * Creates the application.
     *
     * @return \Laravel\Lumen\Application
     */
    public function createApplication()
    {
        return require __DIR__.'/../bootstrap/app.php';
    }

    protected function getFixture($file) : string
    {
        $data = file_get_contents(base_path('tests/Fixtures/') . $file);
        return utf8_decode($data) ?: '';
    }
}
