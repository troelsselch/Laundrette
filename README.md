# Laundrette

This is still in the early stages so interfaces might change.

## TODO

- Autoloader
- Proper namespace structure
- Logger
- Test cases using file adapter

## Usage:

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

      $base_path = "~/test_data/";
      $adapter = new DummyAdapter($base_path);
      $api = new Laundrette($adapter);
      $data = $api->getTransactions();

