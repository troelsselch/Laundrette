<?php

namespace Laundrette\Adapter;

use \Exception;
use \Laundrette\Parser\LoginFormParser;

class CurlAdapter implements AdapterInterface
{
    private $baseUrl;
    private $curl;

    public function __construct($baseUrl, $username, $password, $verbose = false)
    {
        if (!function_exists('curl_exec')) {
            throw new Exception('PHP cUrl is not enabled.');
        }

        if (substr($baseUrl, -1) != '/') {
            $baseUrl .= '/';
        }
        $this->baseUrl = $baseUrl;

      // Set up curl.
        $this->curl = curl_init();
        curl_setopt($this->curl, CURLOPT_RETURNTRANSFER, true);
        $cookiefile = './cookiejar_' . md5($username . $password) . '.txt';
        curl_setopt($this->curl, CURLOPT_COOKIEFILE, $cookiefile);
        curl_setopt($this->curl, CURLOPT_COOKIEJAR, $cookiefile);
        curl_setopt($this->curl, CURLOPT_FOLLOWLOCATION, true);

        if ($verbose) {
            curl_setopt($this->curl, CURLOPT_VERBOSE, true);
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

    public function call($path, $data = null)
    {
        curl_setopt($this->curl, CURLOPT_URL, $this->baseUrl . $path);

        if ($data) {
            curl_setopt($this->curl, CURLOPT_POST, true);
            curl_setopt($this->curl, CURLOPT_POSTFIELDS, http_build_query($data));
        } else {
            curl_setopt($this->curl, CURLOPT_POST, false);
            curl_setopt($this->curl, CURLOPT_POSTFIELDS, null);
        }
      // TODO error handling
        if (curl_error($this->curl)) {
            throw new Exception(curl_error($this->curl));
        }

        return utf8_decode(curl_exec($this->curl));
    }

    public function close()
    {
        curl_close($this->curl);
    }
}
