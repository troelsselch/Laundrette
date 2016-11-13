<?php

require 'vendor/autoload.php';

use Laundrette\Laundrette;
use Laundrette\Adapter\DummyAdapter;

$base_path = '/home/troels/workspace/vasketur-api-testdata/';
$adapter = new DummyAdapter($base_path);
$api = new Laundrette($adapter);

$data = $api->getTransactions();
print "=== Transactions ===\n";
output($data);

$data = $api->getBalance();
print "=== Balance ===\n";
output($data);

$data = $api->getReservations();
print "=== Reservations ===\n";
output($data);

$data = $api->getMachineStates();
print "=== MachineStates ===\n";
output($data);

function output($data) {
  if (is_array($data)) {
    foreach ($data as $datum) {
      if (is_array($datum)) {
        foreach ($datum as $d) {
          print $d . "\n";
        }
      }
      else {
        print $datum . "\n";
      }
    }
  }
  else {
    print $data . "\n";
  }
  print "\n";
}

$api->close();
