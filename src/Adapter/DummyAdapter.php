<?php

namespace Laundrette\Adapter;

class DummyAdapter implements AdapterInterface
{
    private $basePath;

    public function __construct($basePath)
    {
        if (substr($basePath, -1) != '/') {
            $basePath .= '/';
        }
        $this->basePath = $basePath;
    }

    public function call($path, $data = null)
    {
        $fullPath = $this->basePath . $path;
        if (file_exists($fullPath)) {
            return utf8_decode(file_get_contents($this->basePath . $path));
        } else {
            throw new Exception("File '$fullPath' not found");
        }
    }

    public function close()
    {

    }
}
