<?php

require 'vendor/autoload.php';

use Laundrette\Laundrette;
use Laundrette\Adapter\DummyAdapter;

$base_path = '/home/troels/workspace/vasketur-api-testdata/';
$adapter = new DummyAdapter($base_path);
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
