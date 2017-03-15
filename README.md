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
`vasketur.dk`), e.g. for http://**vask**.vasketur.dk/**030**.

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

## Security

This API takes your username and password as arguments, but they are not stored.
However it is up to you to also avoid storing the username and password when
using the API. By storing I mean on disk or in a database. You can of course
store them in a `$_SESSION`.

Also not that the `CurlAdapter` will create a cookiejar file holding a session
token which also allows access to the site. This will be stored in the current
working directory and will be called `cookiejar_[md5 hash].txt`.

## Contributing

Contributions are welcome, but I reserve the right to deny any pull requests.
Contact me before making any changes if you would like to make sure your time is
not wasted.

## License

Laundrette is released under the MIT License. See [LICENSE](https://github.com/troelsselch/Laundrette/blob/master/LICENSE) file for details.
