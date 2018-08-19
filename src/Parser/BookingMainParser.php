<?php

namespace Laundrette\Parser;

use Exception;
use DateTime;
use DOMElement;
use Laundrette\Entity\Machine;
use Laundrette\Entity\Reservation;

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

    public function parse()
    {
        $bookingsId = self::PREFIX . 'DataGridBookings';

        $data = [];

        $element = $this->dom->getElementById($bookingsId);

        if (empty($element->nodeValue)) {
            return $data;
        }

        switch ($element->firstChild->tagName) {
            case 'tr':
                $list = $element->childNodes;
                break;

            case 'tbody':
                $list = $element->firstChild->childNodes;
                break;

            default:
                $fileName = $this->saveHtml();
                $message = sprintf('Unknown child element in num_bookings. See %s', getcwd() . '/' . $fileName);
                throw new Exception($message);
        }

        $column = 0;

        foreach ($list as $tr) {
            $row = [];

            foreach ($tr->childNodes as $td) {
                if (!$td instanceof DOMElement) {
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
            $row['date'] = str_replace(['Maj', 'Okt'], ['May', 'Oct'], $row['date']);
            // Remove week day (i.e. everything before the first space).
            $row['date'] = preg_replace('/^[^ ]* \s*/', '', $row['date']);

            $dateString = $row['date'] . ' ' . $row['start_time'];
            $startTime = DateTime::createFromFormat('j M H:i', $dateString);

            $machine = Machine::createFromString($row['machine']);

            $data[] = new Reservation($startTime, $machine);
        }

        return $data;
    }
}
