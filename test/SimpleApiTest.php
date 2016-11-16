<?php

require 'vendor/autoload.php';

use Laundrette\Laundrette;
use Laundrette\Adapter\DummyAdapter;
use Laundrette\Adapter\CurlAdapter;

if (count($argv) > 2) {
  $username = $argv[1];
  $password = $argv[2];
  $base_path = 'http://vask.vasketur.dk/030/';
  $adapter = new CurlAdapter($base_path, $username, $password);
  print PHP_EOL . "Using CurlAdapter" . PHP_EOL;
}
else {
  $base_path = '/home/troels/workspace/vasketur-api-testdata/';
  $adapter = new DummyAdapter($base_path);
  print PHP_EOL . "Using DummyAdapter" . PHP_EOL;
}

$api = new Laundrette($adapter);

$data = $api->getTransactions();
print "=== Transactions ===" . PHP_EOL;
output($data);

$data = $api->getBalance();
print "=== Balance ===" . PHP_EOL;
output($data);

$data = $api->getReservations();
print "=== Reservations ===" . PHP_EOL;
output($data);

$data = $api->getMachineStates();
print "=== MachineStates ===" . PHP_EOL;
output($data);

function output($data) {
  if (is_array($data)) {
    foreach ($data as $datum) {
      if (is_array($datum)) {
        foreach ($datum as $d) {
          print $d . PHP_EOL;
        }
      }
      else {
        print $datum . PHP_EOL;
      }
    }
  }
  else {
    print $data . PHP_EOL;
  }
  print PHP_EOL;
}

$api->close();
