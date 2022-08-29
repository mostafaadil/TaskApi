<?php

namespace  App\Creationl\Bulider\Models;

use App\Creationl\Bulider\Models\File;

class ImageFile extends File
{
    private $data = [];
    public function setProrite($key, $value)
    {
        $this->data[$key] = $value;
    }

    public function getImageProptres(){
        return $this->data;
    }
}
