<?php

namespace Laundrette\Api\Parser;

class LoginFormParser extends LaundretteParser {

  public function parse($html) {
    $dom = $this->loadDOM($html);

    $post_data = array(
      '_ctl0:MessageType' => 'ERROR',
      '__EVENTTARGET' => '_ctl0$ContentPlaceHolder1$btOK',
      '__EVENTARGUMENT' => '',
    );

    $element = $dom->getElementById('__VIEWSTATEGENERATOR');
    $value = ($element ? $element->getAttribute('value') : '';
    $post_data['__VIEWSTATEGENERATOR'] = $value;

    $element = $dom->getElementById('__VIEWSTATE');
    $value = ($element ? $element->getAttribute('value') : '';
    $post_data['__VIEWSTATE'] = $value;

    $element = $dom->getElementById('__EVENTVALIDATION');
    $value = ($element ? $element->getAttribute('value') : '';
    $post_data['__EVENTVALIDATION'] = $value;

    return $post_data;
  }
}
