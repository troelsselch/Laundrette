<?php

namespace Laundrette\Test;

use PHPUnit\Framework\TestCase as PHPUnitTestCase;

class TestCase extends PHPUnitTestCase
{
    protected function getFixture($file) : string
    {
        return utf8_decode(file_get_contents(__DIR__ . '/Fixtures/' . $file)) ?: '';
    }
}
