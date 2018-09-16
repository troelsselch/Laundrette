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
        $this->datetime = $datetime;
        $this->machine = $machine;
        $this->amount = $amount;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return DateTime
     */
    public function getDatetime()
    {
        return $this->datetime;
    }

    /**
     * @return Machine
     */
    public function getMachine()
    {
        return $this->machine;
    }

    /**
     * @return int
     */
    public function getAmount()
    {
        return $this->amount;
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
