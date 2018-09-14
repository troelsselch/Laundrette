<?php

namespace Laundrette\Adapter;

use Laundrette\Laundrette;
use Laundrette\Parser\LoginFormParser;
use GuzzleHttp\Client;

class GuzzleAdapter implements AdapterInterface
{

    private $guzzle;

    private $baseUrl;

    public function __construct($baseUrl, $username, $password)
    {
        if (substr($baseUrl, -1) != '/') {
            $baseUrl .= '/';
        }
        $this->baseUrl = $baseUrl;

        $this->guzzle = new Client([
            'base_uri' => $baseUrl,
            'cookies' => true,
        ]);

        $this->login($username, $password);
    }

    private function login($username, $password)
    {
        // Get login form.
        $response = $this->guzzle->get(Laundrette::PATH_DEFAULT);
        $html = $response->getBody();

        // If the text 'Min side' is on the page, then we are already logged in.
        if (preg_match('/min side/i', $html)) {
            return;
        }

        // Parse login form tokens to be used in post request.
        $parser = new LoginFormParser($html);
        $postData = $parser->parse();

        $postData['_ctl0:ContentPlaceHolder1:tbUsername'] = $username;
        $postData['_ctl0:ContentPlaceHolder1:tbPassword'] = $password;

        // Perform login post request.
        $this->call(Laundrette::PATH_DEFAULT, $postData);
    }

    public function call($path, $data = null)
    {
        $method = 'GET';
        $options = [];
        if ($data) {
            $method = 'POST';
            $options = ['form_params' => $data];
        }

        $response = $this->guzzle->request($method, $path, $options);

        return utf8_decode($response->getBody());
    }
}
