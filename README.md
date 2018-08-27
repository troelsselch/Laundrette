[![Codacy Badge](https://api.codacy.com/project/badge/Grade/f9b8e782735f42b98896fab67c19edd3)](https://www.codacy.com/project/troelsselch/Laundrette/dashboard?utm_source=github.com&amp;utm_medium=referral&amp;utm_content=troelsselch/Laundrette&amp;utm_campaign=Badge_Grade_Dashboard)

[![Codacy Badge](https://api.codacy.com/project/badge/Coverage/f9b8e782735f42b98896fab67c19edd3)](https://www.codacy.com/app/troelsselch/Laundrette?utm_source=github.com&utm_medium=referral&utm_content=troelsselch/Laundrette&utm_campaign=Badge_Coverage)

# Laundrette

A PHP interface for getting information from vasketur.dk in parseable data
format. **This is still in the early stages so interfaces might change.**

Vasketur.dk is a webinterface for booking washing machines in apartment
buildings. The visual interface is not really to my liking, so I made this API
in order to pull the data and display it in a better way, including making it
mobile friendly.

## TODO

- Job/Service to pull transaction data to local storage.
- Frontend implementation.
- "Make reservations" functionality.
- Class and method documentation.

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
      $adapter = new GuzzleAdapter($url, $username, $password);
      $api = new Laundrette($adapter);
      $data = $api->getTransactions();
    }

## Testing

You can run the test as follows:

Simply fun PHPUnit tests:

    vendor/bin/phpunit

Create code coverage report:

    vendor/bin/phpunit --coverage-html coverage
    
Public coverage to Codacy:

    vendor/bin/phpunit --coverage-cover build/index.xml
    vendor/bin/codacycoverage clover build/index.xml


## Security

This API takes your username and password as arguments, but they are not stored.
However it is up to you to also avoid storing the username and password when
using the API. By storing I mean on disk or in a database. You can of course
store them in a `$_SESSION`.

Note that the `CurlAdapter` will create a cookiejar file holding a session
token which also allows access to the site. This will be stored in the current
working directory and will be called `cookiejar_[md5 hash].txt`.

## Contributing

Contributions are welcome, but I reserve the right to deny any pull requests.
Contact me before making any changes if you would like to make sure your time is
not wasted.

## License

Laundrette is released under the MIT License. See [LICENSE](https://github.com/troelsselch/Laundrette/blob/master/LICENSE) file for details.
