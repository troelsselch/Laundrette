<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Laundrette\Laundrette;
use Laundrette\Adapter\CurlAdapter;
use Laundrette\Adapter\GuzzleAdapter;

if (count($argv) < 2) {
    print "Missing arguments\n";
    exit();
}

function output($data)
{
    if (is_array($data)) {
        foreach ($data as $datum) {
            if (is_array($datum)) {
                foreach ($datum as $d) {
                    print $d . PHP_EOL;
                }
            } else {
                print $datum . PHP_EOL;
            }
        }
    } else {
        print $data . PHP_EOL;
    }
    print PHP_EOL;
}

try {
    $username = $argv[1];
    $password = $argv[2];
    $basePath = 'http://vask.vasketur.dk/030/';
    //$adapter = new CurlAdapter($basePath, $username, $password);
    $adapter = new GuzzleAdapter($basePath, $username, $password);
    print PHP_EOL . "Using CurlAdapter" . PHP_EOL;

    $api = new Laundrette($adapter);

    $data = $api->getTransactions();
    print "=== Transactions ===" . PHP_EOL;
    output($data);

    $data = $api->getBalance();
    print "=== Balance ===" . PHP_EOL;
    output($data);

    $data = $api->getReservations();
    print "=== Reservations ===" . PHP_EOL;
    if (empty($data)) {
        print "No reservations.\n";
    }
    output($data);

    $data = $api->getMachineStates();
    print "=== MachineStates ===" . PHP_EOL;
    output($data);
} catch (Exception $e) {
    printf("Exception: %s", $e->getMessage());
}