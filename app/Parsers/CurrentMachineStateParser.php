<?php

namespace App\Parsers;

use Exception;
use App\Models\Machine;
use App\Models\MachineState;

class CurrentMachineStateParser extends LaundretteParser
{
    // Used for /Machine/MachineGroupStat.aspx.

    private $machineIds = [
        self::PREFIX . 'Repeater1__ctl0_Repeater2__ctl0',
        self::PREFIX . 'Repeater1__ctl0_Repeater2__ctl1',
        self::PREFIX . 'Repeater1__ctl0_Repeater2__ctl2',
        self::PREFIX . 'Repeater1__ctl2_Repeater2__ctl0',
        self::PREFIX . 'Repeater1__ctl2_Repeater2__ctl1',
    ];

    public function parse()
    {
        $data = [];

        foreach ($this->machineIds as $id) {
            $name = $this->getMachineName($id);

            $data[] = new MachineState(
                Machine::createFromString($name),
                $this->getBookedByMe($id),
                $this->getAvailability($name),
                $this->getMachineState($id)
            );
        }

        return $data;
    }

    private function getMachineName($machineId) : string
    {
        $nameElement = $this->dom->getElementById($machineId . '_MaskGrpTitle');

        if (is_null($nameElement)) {
            $fileName = $this->saveHtml();
            $message = 'Could not parse dom for file ' . getcwd() . '/' . $fileName;
            throw new Exception($message);
        }

        return $nameElement->nodeValue;
    }

    private function getMachineState($machineId) : string
    {
        $stateElement = $this->dom->getElementById(
            $machineId . '_Repeater3__ctl1_LabelStatus'
        );

        /**
         * Can be:
         * - "VASK 1 Afsluttedes 18:23"
         * - "VASK 3 Klar ca: 19:57"
         */
        return $stateElement->nodeValue;
    }

    private function getAvailability($name) : bool
    {
        // Check if the machine is currently available.
        $match = [];
        preg_match('/Ledig/', $name, $match);

        return !empty($match);
    }

    private function getBookedByMe($machineId) : bool
    {
        $bookedbymeElement = $this->dom->getElementById($machineId . '_BookedByMe');

        if (is_null($bookedbymeElement)) {
            $fileName = $this->saveHtml();
            $message = 'Could not parse dom for file ' . getcwd() . '/' . $fileName;
            throw new Exception($message);
        }

        // BookedByMe is an input field, so it needs extra processing.
        $bookedbymeValue = $bookedbymeElement->getAttribute('value');

        return (strtolower($bookedbymeValue) == 'true');
    }
}
