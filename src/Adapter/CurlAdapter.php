<?php

namespace Laundrette\Adapter;

use \Exception;
use \Laundrette\Parser\LoginFormParser;

class CurlAdapter implements AdapterInterface {
  private $base_url;
  private $curl;
  private $debug;

  public function __construct($base_url, $username, $password, $debug = FALSE) {
    if (!function_exists('curl_exec')) {
      throw new Exception('PHP cUrl is not enabled.');
    }

    if (substr($base_url, -1) != '/') {
      $base_url .= '/';
    }
    $this->base_url = $base_url;

    // Set up curl.
    $this->curl = curl_init();
    curl_setopt($this->curl, CURLOPT_RETURNTRANSFER, TRUE);
    $cookiefile = './cookiejar_' . md5($username . $password) . '.txt';
    curl_setopt($this->curl, CURLOPT_COOKIEFILE, $cookiefile);
    curl_setopt($this->curl, CURLOPT_COOKIEJAR, $cookiefile);
    curl_setopt($this->curl, CURLOPT_FOLLOWLOCATION, TRUE);

    // TODO Adapter shouldn't know if it should debug. Use logger instead.
    $this->debug = $debug;

    $this->login($username, $password);
  }

  private function login($username, $password) {
    $path = 'Default.aspx';
    // Get login form.
    $html = $this->call($path);

    // If the text 'Min side' is on the page, then we are already logged in.
    if (preg_match('/min side/i', $html)) {
      return;
    }

    // Parse login form tokens to be used in post request.
    $parser = new LoginFormParser();
    $post_data = $parser->parse($html);

    $post_data['_ctl0:ContentPlaceHolder1:tbUsername'] = $username,
    $post_data['_ctl0:ContentPlaceHolder1:tbPassword'] = $password,

    // TODO check if "min side" is in html so we know if login succeded.
    // TODO error handling
    // Perform login post request.
    $this->adapter->call($path, $post_data);
  }

  public function call($path, $data = NULL) {
    if ($this->debug) {
      print $this->base_url . $path . PHP_EOL;
    }

    curl_setopt($this->curl, CURLOPT_URL, $this->base_url . $path);

    if ($this->debug) {
      curl_setopt($this->curl, CURLOPT_VERBOSE, TRUE);
    }

    if ($data) {
      curl_setopt($this->curl, CURLOPT_POST, TRUE);
      curl_setopt($this->curl, CURLOPT_POSTFIELDS, http_build_query($data));
    } else {
      curl_setopt($this->curl, CURLOPT_POST, FALSE);
      curl_setopt($this->curl, CURLOPT_POSTFIELDS, NULL);
    }
    // TODO error handling
    if (curl_error($this->curl)) {
      die(curl_error($this->curl));
    }

    return utf8_decode(curl_exec($this->curl));
  }

  public function close() {
    curl_close($this->curl);
  }
}
