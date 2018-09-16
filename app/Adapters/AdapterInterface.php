<?php

namespace App\Adapters;

interface AdapterInterface
{

    public function call($path, $data = null);

    public function setEventTarget(string $target);

}
