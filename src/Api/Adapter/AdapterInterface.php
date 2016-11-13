<?php

namespace Laundrette\Api\Adapter;

class AdapterInterface {

  public function call($path, $data);

  public function close();
}
