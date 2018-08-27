<?php

namespace Laundrette\Parser;

use DateInterval;
use DateTime;
use Laundrette\Entity\TimeSlot;

class BookingCalendarParser extends LaundretteParser
{
    public function parse()
    {
        $year = date('Y');
        $month = $this->getMonthName();
        $yearMonth = $year . ' ' . $month;

        $dates = $this->getDates();

        $data = [];
        for ($dayCol = 0; $dayCol <= 6; $dayCol++) {
            for ($timeRow = 1; $timeRow <= 7; $timeRow++) {
                $timeSlot = new TimeSlot();

                $timeSlot->setTimeslot($timeRow);

                // If date changes, we also change month.
                if ($dayCol > 0 && $dates[$dayCol] < $dates[$dayCol-1]) {
                    /** @var TimeSlot $previous */
                    $previous = end($data);
                    $dateTime = DateTime::createFromFormat('Y-m-d', $previous->getTimeString());
                    $yearMonth = $dateTime->add(new DateInterval('P1D'))->format('Y M');
                }

                $timeStr = $yearMonth . ' ' . $dates[$dayCol];

                $timeSlot->setTimeString(DateTime::createFromFormat('Y M d', $timeStr));

                $cellId = self::PREFIX . $dayCol . ',' . $timeRow . ',1,';
                $cellData = $this->dom->getElementById($cellId);
                $available = empty($cellData->getAttribute('disabled'));
                $timeSlot->setAvailable($available);

                $data[] = $timeSlot;
            }
        }

        return $data;
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
            preg_match('/[A-Za-zæøå]+([0-9]+)/', $day, $matches);
            $dates[] = (int) $matches[1];
        }

        return $dates;
    }
}
