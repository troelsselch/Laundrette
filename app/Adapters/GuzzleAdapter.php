<?php

namespace App\Adapters;

use App\Http\Controllers\LaundretteController;
use DOMDocument;
use DOMElement;
use GuzzleHttp\Client;
use Exception;

class GuzzleAdapter implements AdapterInterface
{
    private $guzzle;

    private $baseUrl;

    private $state = [
        '__EVENTARGUMENT' => '',
        '__EVENTTARGET' => '',
        '__EVENTVALIDATION' => '',
        '__VIEWSTATE' => '',
        '__VIEWSTATEGENERATOR' => '',
        '_ctl0:MessageType' => 'ERROR',
    ];

    public function __construct($baseUrl, $username, $password)
    {
        if (empty($baseUrl) || empty($username) || empty($password)) {
            throw new Exception('Missing url, username, and/or password configuration.');
        }

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
        $html = $this->call(LaundretteController::PATH_DEFAULT);

        // If the text 'Min side' is on the page, then we are already logged in.
        if (preg_match('/min side/i', $html)) {
            return;
        }

        $postData['_ctl0:ContentPlaceHolder1:tbUsername'] = $username;
        $postData['_ctl0:ContentPlaceHolder1:tbPassword'] = $password;
        $this->setEventTarget('_ctl0$ContentPlaceHolder1$btOK');

        $this->call(LaundretteController::PATH_DEFAULT, $postData);
    }

    public function call($path, $data = null) : string
    {
        $method = 'GET';
        $options = [];
        if ($data) {
            $method = 'POST';
            $options = ['form_params' => $data + $this->state];
        }

        $response = $this->guzzle->request($method, $path, $options);

        $html = utf8_decode($response->getBody());

        $this->saveState($html);

        return $html;
    }

    public function setEventTarget(string $target) : void
    {
        $this->state['__EVENTTARGET'] = $target;
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
