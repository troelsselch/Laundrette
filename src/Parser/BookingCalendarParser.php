<?php


namespace Laundrette\Parser;


class BookingCalendarParser extends LaundretteParser
{
    public function parse()
    {
        $monthName = $this->getMonthName();

        $dates = $this->getDates();
var_dump($dates);
        for ($dayCol = 0; $dayCol <= 6; $dayCol++) {
            for ($timeRow = 1; $timeRow <= 7; $timeRow++) {
                $cellId = self::PREFIX . $dayCol . ',' . $timeRow . ',1,';

            }
        }
        $data = [];

        $times = [];

        return [];
    }

    private function getMonthName() : string
    {
        $monthId = self::PREFIX . 'lbCalendarDatum';
        return $this->dom->getElementById($monthId)->nodeValue;
    }

    private function getDates() : array
    {
        $dates = [];
        for ($dayNum = 0; $dayNum <= 6; $dayNum++) {
            $dayId = self::PREFIX . 'lbCalendarDag' . $dayNum;
            $day = $this->dom->getElementById($dayId)->nodeValue;
            $matches = [];
            var_dump($day);
            preg_match('/[A-Z][a-zæøå][a-zæøå]([0-9]+)/', $day, $matches);
            var_dump($matches);
            $dates[] = $matches[1];
        }

        return $dates;
    }
}