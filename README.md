# Laundrette

A PHP interface for getting information from vasketur.dk in parseable data
format. **This is still in the early stages so interfaces might change.**

Vasketur.dk is a webinterface for booking washing machines in apartment
buildings. The visual interface is not really to my liking, so I made this API
in order to pull the data and display it in a better way, including making it
mobile friendly.

## TODO

- Find and fix TODOs.
- Logger (should this be included in the api?)
- Class and method documentation.
- Show available time slots.
- "Make reservations" functionality.

## Limitations

You cannot (yet) make any reservations using this API.

## Usage

Find your laundrette url. This will be unique for each laundrette. You need to
be aware of both the subdomain (before `vasketur.dk`) and the id (after
`vasktur.dk`), e.g. for http://**vask**.vasketur.dk/**030**.

Create autoloader using composer. Run

    composer install

Example code:

    if (in_cache('transactions')) {
      $data = cache_get('transactions');
    }
    else {
      $url = "http://vask.vasketur.dk/030/";
      $adapter = new CurlAdapter($url, $username, $password);
      $api = new Laundrette($adapter);
      $data = $api->getTransactions();
    }

## Testing

To run the test in `test/SimpleApiTest.php` you must log into vasketur.dk
and save the pages to your local machine. You should save the following

- Min side as `Booking/BookingMain.aspx`.
- Status as `ELS_DEB/LoadBalance.aspx`.
- Saldo as `Machine/MachineGroupStat.aspx`.

Then you can run the test as follows:

    php test/SimpleApiTest.php

This will output the data for the api calls.
