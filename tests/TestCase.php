<?php

namespace Tests;

use Laravel\Lumen\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
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
