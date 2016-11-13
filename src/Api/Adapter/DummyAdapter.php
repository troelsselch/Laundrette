<?php

namespace Laundrette\Api\Adapter;

class DummyAdapter implements AdapterInterface {
  private $base_path;

  public function __construct($base_path) {
    if (substr($base_path, -1) != '/') {
      $base_path .= '/';
    }
    $this->base_path = $base_path;
  }

  public function call($path, $data = NULL) {
    if (file_exists($this->base_path . $path)) {
      return utf8_decode(file_get_contents($this->base_path . $path));
    }
  }
}
