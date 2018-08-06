<?php

namespace Laundrette\Adapter;

class DummyAdapter implements AdapterInterface
{
    private $_basePath;

    public function __construct($basePath)
    {
        if (substr($basePath, -1) != '/') {
            $basePath .= '/';
        }
        $this->_basePath = $basePath;
    }

    public function call($path, $data = null)
    {
        $fullPath = $this->_basePath . $path;
        if (file_exists($fullPath)) {
            return utf8_decode(file_get_contents($this->_basePath . $path));
        } else {
            throw new Exception("File '$fullPath' not found");
        }
    }

    public function close()
    {

    }
}
