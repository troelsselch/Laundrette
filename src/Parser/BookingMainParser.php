<?php

namespace Laundrette\Parser;

use \Exception;
use \DateTime;
use \Laundrette\Entity\Machine;
use \Laundrette\Entity\Reservation;

class BookingMainParser extends LaundretteParser
{

    /** @var int Column of the date in the booking result. */
    const BOOKING_DATE = 0;

    /** @var int Column of the machine name in the booking result. */
    const BOOKING_MACHINE = 1;

    /** @var int Column of the start time in the booking result. */
    const BOOKING_START_TIME = 2;

    /** @var int Column of the end time in the booking result. */
    const BOOKING_END_TIME = 4;

    public function parse($html)
    {
        $dom = $this->loadDOM($html);

        $bookingsHeadlineId = self::PREFIX . 'lbBokningarRubrik';
        $bookingsId = self::PREFIX . 'DataGridBookings';

        $data = [
            'message' => '',
            'reservations' => [],
        ];

        // lbBokningarRubrik = "Du har ikke bestilt noget." og
        // DataGridBookings = empty table
        // lbBokningarRubrik = "Dine nuværende bestillinger ( 2 )" og
        // DataGridBookings = x antal <tr>s
        // TODO New error handling.
        $headlineElement = $dom->getElementById($bookingsHeadlineId);
        if (is_null($headlineElement)) {
            $fileHash = md5($html);
            $fileName = $fileHash . "_bookingmain.html";
            file_put_contents($fileName, $html);
            $message = 'Could not parse dom for file ' . getcwd() . '/' . $fileName;
            error_log($message);
            return null;
        }

        $parenthesisPos = strpos($headlineElement->nodeValue, '(');
        if ($parenthesisPos !== false) {
            $data['message'] = substr(
                $headlineElement->nodeValue,
                0,
                $parenthesisPos - 1
            );
        } else {
            $data['message'] = $headlineElement->nodeValue;
        }

        $element = $dom->getElementById($bookingsId);

        if (empty($element->nodeValue)) {
            return $data;
        }

        if ($element->firstChild->tagName == 'tr') {
            $list = $element->childNodes;
        } elseif ($element->firstChild->tagName == 'tbody') {
            $list = $element->firstChild->childNodes;
        } else {
            throw new Exception('Unknown child element in num_bookings.');
        }

        $reservations = [];
        $column = 0;

        foreach ($list as $tr) {
            $row = [];

            foreach ($tr->childNodes as $td) {
                if (get_class($td) != 'DOMElement') {
                    continue;
                }

                switch ($column % 6) {
                    case self::BOOKING_DATE:
                        $row['date'] = $td->nodeValue;
                        break;

                    case self::BOOKING_MACHINE:
                        $row['machine'] = $td->nodeValue;
                        break;

                    case self::BOOKING_START_TIME:
                        $row['start_time'] = $td->nodeValue;
                        break;

                    // TODO Remove BOOKING_END_TIME since it is not being used.
                    case self::BOOKING_END_TIME:
                        $row['end_time'] = $td->nodeValue;
                        break;

                    default:
                        // Ignore split and cancel button
                        break;
                }

                $column++;
            }

            // TODO When calculating the start date we only have month and date.
            // We know that the date will always be in the future and never more than
            // 30 (31) days into the future, so if month is january (maybe february)
            // and current month is november/december then year will be next year.

            // Translate Danish month abbreviations. All other abbreviations are the
            // same as in English.
            $row['date'] = str_replace("Maj", "May", $row['date']);
            $row['date'] = str_replace("Okt", "Oct", $row['date']);
            // Remove week day (i.e. everything before the first space).
            $row['date'] = preg_replace('/^[^ ]* \s*/', '', $row['date']);

            $dateString = $row['date'] . ' ' . $row['start_time'];
            $starttime = DateTime::createFromFormat('j M H:i', $dateString);

            $machine = new Machine($row['machine']);

            $reservations[] = new Reservation($starttime, $machine);
        }

        $data['reservations'] = $reservations;

        return $data;
    }
}
