<?php

namespace Laundrette\Api\Parser;

class MachineGroupStatParser extends LaundretteParser {

  public function parse($html) {
    $dom = $this->loadDOM($html);

    $machine_data = array();

    $machine_ids = array(
      self::PREFIX . 'Repeater1__ctl0_Repeater2__ctl0',
      self::PREFIX . 'Repeater1__ctl0_Repeater2__ctl1',
      self::PREFIX . 'Repeater1__ctl0_Repeater2__ctl2',
      self::PREFIX . 'Repeater1__ctl2_Repeater2__ctl0',
      self::PREFIX . 'Repeater1__ctl2_Repeater2__ctl1',
    );

    foreach ($machine_ids as $id) {
      $name_element = $dom->getElementById($id . '_MaskGrpTitle');
      $state_element = $dom->getElementById($id . '_Repeater3__ctl1_LabelStatus');
      $bookedbyme_element = $dom->getElementById($id . '_BookedByMe');

      // TODO: new error handling.
      if (is_null($bookedbyme_element) || is_null($name_element)) {
        $file_hash = md5($html);
        $file_name = $file_hash . "_machinegroupstat.html";
        file_put_contents($file_name, $html);
        $message = 'Could not parse dom for file ' . getcwd() . '/' . $file_name;
        error_log($message);
        return NULL;
      }

      $name = $name_element->nodeValue;
      $state = $state_element->nodeValue;

      // BookedByMe is an input field, so it needs extra processing.
      $bookedbyme_value = $bookedbyme_element->getAttribute('value');
      $booked_by_me = (strtolower($bookedbyme_value) == 'true');

      // Check if the machine is currently available.
      $match = array();
      preg_match('/Ledig/', $name, $match);
      $available = !empty($match);

      $machine = new Machine($name, $state);
      $machine_data[] = new MachineState($machine, $booked_by_me, $available);
    }

    return $machine_data;
  }
}
