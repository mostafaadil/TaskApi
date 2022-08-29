<?php

namespace App\Creationl\Bulider\Models;

class ViedoFile
{
    private $data = [];

    public function setPart($key, $value)
    {
        $this->data[$key] = $value;
    }
}
