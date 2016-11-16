<?php

namespace Laundrette\Parser;

use Laundrette\Entity\Machine;
use Laundrette\Entity\MachineState;

class MachineGroupStatParser extends LaundretteParser
{

  public function parse($html)
  {
    $dom = $this->loadDOM($html);

    $machineData = array();

    $machineIds = array(
      self::PREFIX . 'Repeater1__ctl0_Repeater2__ctl0',
      self::PREFIX . 'Repeater1__ctl0_Repeater2__ctl1',
      self::PREFIX . 'Repeater1__ctl0_Repeater2__ctl2',
      self::PREFIX . 'Repeater1__ctl2_Repeater2__ctl0',
      self::PREFIX . 'Repeater1__ctl2_Repeater2__ctl1',
    );

    foreach ($machineIds as $id) {
      $nameElement = $dom->getElementById($id . '_MaskGrpTitle');
      $stateElement = $dom->getElementById(
          $id . '_Repeater3__ctl1_LabelStatus'
      );
      $bookedbymeElement = $dom->getElementById($id . '_BookedByMe');

      // TODO: new error handling.
      if (is_null($bookedbymeElement) || is_null($nameElement)) {
        $fileHash = md5($html);
        $fileName = $fileHash . "_machinegroupstat.html";
        file_put_contents($fileName, $html);
        $message = 'Could not parse dom for file ' . getcwd() . '/' . $fileName;
        error_log($message);
        return NULL;
      }

      $name = $nameElement->nodeValue;
      $state = $stateElement->nodeValue;

      // BookedByMe is an input field, so it needs extra processing.
      $bookedbymeValue = $bookedbymeElement->getAttribute('value');
      $bookedByMe = (strtolower($bookedbymeValue) == 'true');

      // Check if the machine is currently available.
      $match = array();
      preg_match('/Ledig/', $name, $match);
      $available = !empty($match);

      $machine = new Machine($name, $state);
      $machineData[] = new MachineState($machine, $bookedByMe, $available);
    }

    return $machineData;
  }
}
