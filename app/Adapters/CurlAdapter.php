<?php

namespace App\Adapters;

use DOMDocument;
use DOMElement;
use Exception;
use App\Parsers\LoginFormParser;

class CurlAdapter implements AdapterInterface
{
    private $baseUrl;

    private $curl;

    private $state = [
        '__EVENTARGUMENT' => '',
        '__EVENTTARGET' => '',
        '__EVENTVALIDATION' => '',
        '__VIEWSTATE' => '',
        '__VIEWSTATEGENERATOR' => '',
        '_ctl0:MessageType' => 'ERROR',
    ];

    public function __construct(
        $baseUrl,
        $username,
        $password,
        $verbose = false
    ) {
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

        $postData['_ctl0:ContentPlaceHolder1:tbUsername'] = $username;
        $postData['_ctl0:ContentPlaceHolder1:tbPassword'] = $password;
        $postData['__EVENTTARGET'] = '_ctl0$ContentPlaceHolder1$btOK';

        // Perform login post request.
        $this->call($path, $postData);
    }

    public function call($path, $data = null)
    {
        curl_setopt($this->curl, CURLOPT_URL, $this->baseUrl . $path);

        if ($data) {
            curl_setopt($this->curl, CURLOPT_POST, true);
            curl_setopt(
                $this->curl,
                CURLOPT_POSTFIELDS,
                http_build_query($data)
            );
        }

        if (curl_error($this->curl)) {
            throw new Exception(curl_error($this->curl));
        }

        $result = curl_exec($this->curl);
        $html = utf8_decode($result);

        curl_close($this->curl);

        $this->saveState($html);

        return $html;
    }

    private function saveState(string $html) : void
    {
        $dom = new DOMDocument();
        // Silence warnings. The status page has multiple divs with the same id (imgExpand).
        @$dom->loadHTML($html);
        $dom->preserveWhiteSpace = false;

        $stateIds = [
            '__VIEWSTATEGENERATOR',
            '__VIEWSTATE',
            '__EVENTVALIDATION',
        ];

        foreach ($stateIds as $stateId) {
            /** @var DOMElement $element */
            $element = $dom->getElementById($stateId);
            $this->state[$stateId] = $element ? $element->getAttribute('value') : '';
        }
    }
}
