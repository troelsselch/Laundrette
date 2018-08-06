<?php

namespace Laundrette\Parser;

class LoginFormParser extends LaundretteParser
{

    public function parse($html)
    {
        $dom = $this->loadDOM($html);

        $postData = array(
        '_ctl0:MessageType' => 'ERROR',
        '__EVENTTARGET' => '_ctl0$ContentPlaceHolder1$btOK',
        '__EVENTARGUMENT' => '',
        );

        $element = $dom->getElementById('__VIEWSTATEGENERATOR');
        $value = ($element ? $element->getAttribute('value') : '');
        $postData['__VIEWSTATEGENERATOR'] = $value;

        $element = $dom->getElementById('__VIEWSTATE');
        $value = ($element ? $element->getAttribute('value') : '');
        $postData['__VIEWSTATE'] = $value;

        $element = $dom->getElementById('__EVENTVALIDATION');
        $value = ($element ? $element->getAttribute('value') : '');
        $postData['__EVENTVALIDATION'] = $value;

        return $postData;
    }
}
