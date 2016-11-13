# Laundrette

This is still in the early stages so interfaces might change.

## TODO

- Find TODOs.
- Logger (should this be included in the api?)
- Test cases using dummy adapter
- Class and method documentation.

## Usage:

Create autoloader, run

    composer install

Example code:

    if (in_cache('transactions')) {
      $data = cache_get('transactions');
    }
    else {
      $url = "http://vask2.vasketur.dk/182/";
      $adapter = new CurlAdapter($url, $username, $password);
      $api = new Laundrette($adapter);
      $data = $api->getTransactions();
    }

## Testing

To run the test in `SimpleApiTest.php` you must log into vasketur.dk
and save the pages to your local machine. You should save the following

- Min side as `Booking/BookingMain.aspx`.
- Status as `ELS_DEB/LoadBalance.aspx`.
- Saldo as `Machine/MachineGroupStat.aspx`.

The you can run the test as follows:

    php SimpleApiTest.php

This will output the data for the api calls.
