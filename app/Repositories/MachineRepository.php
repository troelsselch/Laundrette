<?php

namespace App\Repositories;

use App\Models\Machine;
use Doctrine\ORM\EntityRepository;
use Mockery\Exception;

class MachineRepository extends EntityRepository
{
    const REGEX = '([A-ZÆØÅ]+ [1-5])';

    public function findByString(string $string) : Machine
    {
        $matches = [];
        preg_match(self::REGEX, $string, $matches);

        if (empty($matches)) {
            throw new Exception(sprintf('Machine [%s] not found', $string));
        }

        /** @var Machine $machine */
        $machine = $this->findOneBy(['name' => $matches[0]]);

        if (!$machine) {
            throw new Exception(sprintf('Unknown machine [%s]', $matches[0]));
        }

        return $machine;
    }
}
