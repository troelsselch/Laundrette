<?php

namespace Laundrette\Adapter;

class DummyAdapter implements AdapterInterface {
  private $base_path;

  public function __construct($base_path) {
    if (substr($base_path, -1) != '/') {
      $base_path .= '/';
    }
    $this->base_path = $base_path;
  }

  public function call($path, $data = NULL) {
    $full_path = $this->base_path . $path;
    if (file_exists($full_path)) {
      return utf8_decode(file_get_contents($this->base_path . $path));
    }
    else {
      throw new Exception("File '$full_path' not found");
    }
  }

  public function close() {

  }
}
