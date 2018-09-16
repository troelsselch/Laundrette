<?php

namespace App\Models;

use DateTime;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="transactions")
 */
class Transaction
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime")
     */
    private $datetime;

    /**
     * @ORM\ManyToOne(targetEntity="Machine")
     */
    private $machine;

    // Amount in 'ører'. (Never use double to represent money)
    /**
     * @ORM\Column(type="integer")
     */
    private $amount;

    public function __construct(
        DateTime $datetime,
        Machine $machine,
        int $amount
    ) {
        // Datetime and Machine must not change for a given transaction, so we
        // clone them.
        $this->datetime = clone $datetime;
        $this->machine = clone $machine;
        $this->amount = $amount;
    }

    public function __toString()
    {
        return sprintf(
            'Transaction: %s, (%s), %s',
            $this->datetime->format('Y-m-d H:i'),
            $this->machine,
            $this->amount
        );
    }
}
