<?php

namespace Laundrette\Adapter;

use \Exception;
use \Laundrette\Parser\LoginFormParser;

class CurlAdapter implements AdapterInterface
{
  private $_baseUrl;
  private $_curl;

  public function __construct($baseUrl, $username, $password, $verbose = FALSE)
  {
    if (!function_exists('curl_exec')) {
      throw new Exception('PHP cUrl is not enabled.');
    }

    if (substr($baseUrl, -1) != '/') {
      $baseUrl .= '/';
    }
    $this->_baseUrl = $baseUrl;

    // Set up curl.
    $this->_curl = curl_init();
    curl_setopt($this->_curl, CURLOPT_RETURNTRANSFER, TRUE);
    $cookiefile = './cookiejar_' . md5($username . $password) . '.txt';
    curl_setopt($this->_curl, CURLOPT_COOKIEFILE, $cookiefile);
    curl_setopt($this->_curl, CURLOPT_COOKIEJAR, $cookiefile);
    curl_setopt($this->_curl, CURLOPT_FOLLOWLOCATION, TRUE);

    if ($verbose) {
      curl_setopt($this->_curl, CURLOPT_VERBOSE, TRUE);
    }

    $this->login($username, $password);
  }

  private function login($username, $password)
  {
    $path = 'Default.aspx';
    // Get login form.
    $html = $this->call($path);

    // If the text 'Min side' is on the page, then we are already logged in.
    if (preg_match('/min side/i', $html)) {
      return;
    }

    // Parse login form tokens to be used in post request.
    $parser = new LoginFormParser();
    $postData = $parser->parse($html);

    $postData['_ctl0:ContentPlaceHolder1:tbUsername'] = $username;
    $postData['_ctl0:ContentPlaceHolder1:tbPassword'] = $password;

    // TODO check if "min side" is in html so we know if login succeded.
    // TODO error handling
    // Perform login post request.
    $this->call($path, $postData);
  }

  public function call($path, $data = NULL)
  {
    curl_setopt($this->_curl, CURLOPT_URL, $this->_baseUrl . $path);

    if ($data) {
      curl_setopt($this->_curl, CURLOPT_POST, TRUE);
      curl_setopt($this->_curl, CURLOPT_POSTFIELDS, http_build_query($data));
    } else {
      curl_setopt($this->_curl, CURLOPT_POST, FALSE);
      curl_setopt($this->_curl, CURLOPT_POSTFIELDS, NULL);
    }
    // TODO error handling
    if (curl_error($this->_curl)) {
      throw new Exception(curl_error($this->_curl));
    }

    return utf8_decode(curl_exec($this->_curl));
  }

  public function close()
  {
    curl_close($this->_curl);
  }
}
