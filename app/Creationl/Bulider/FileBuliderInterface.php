<?php

namespace App\Creationl\Bulider;


/**  Flie Bulider intfercae with all functions requeired to upload file  */
interface  FileBuliderInterface
{
    public function initFile();
    public function setFile($File);
    public function setDirectory($tragetedPath);
    public function setFileName($name);
    public function setValiedeExtnions($exstions);
    public function getFile();
}
