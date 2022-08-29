<?php
namespace App\Creationl\Bulider\Models;

class TextFile
{
    private $data = [];
    public function uploadFile($key,$value){
        $this->data[$key]=$value;
    }


}
