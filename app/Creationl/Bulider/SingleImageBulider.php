<?php

namespace App\Creationl\Bulider;

use App\Creationl\Bulider\Models\ImageFile;
use App\Creationl\Bulider\Models\File;


class SingleImageBulider implements FileBuliderInterface
{
    /*
    @val $type File
    */

    private $type;
    private $path;
    private $name;
    private $File;
    private $exsations;
    private $shortpath;
    private $finlePtah;
    private $random;
    public function initFile()
    {
        $this->type = new File();
    }

    public function setFile($File)
    {
        return $this->File = $File;
    }

    public function setValiedeExtnions($exsations)
    {
        $this->exsations = $exsations;
        return $this->exsations;
    }
    
    public function setFileName($name)
    {
        $this->name = $name . rand(1, 185840);
        return $name . rand(1, 185840);
    }
    public function setDirectory($tragetedPath)
    {
        $this->path = public_path() . '/' . $tragetedPath;
        if (is_dir(public_path() . '/' . $tragetedPath) == true) {
            $this->shortpath = '/' . $tragetedPath;
            $this->finlePtah = $this->shortpath;
        } else {
            $new = mkdir($this->path);
            if ($new == 1) {
                $this->finlePtah = '/' . $tragetedPath;
            }
            return  $this->finlePtah;
        }
    }
    public function getFile()
    {
        return $this->type->uploadFile($this->File,$this->name, $this->finlePtah, $this->finlePtah, $this->exsations);
    }
}
