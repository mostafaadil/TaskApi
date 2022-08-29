<?php

namespace Creationl\Bulider;

class FileUploader
{


    private $bulider;

    function __construct(FileBuliderInterface $bulider)
    {
        $this->bulider = $bulider;
    }

    public function uploadFile()
    {
        $this->bulider->createFile();
        
        return $this->bulider->getFile();
    }
}
