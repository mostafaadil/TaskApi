<?php

namespace App\Creationl\Bulider;

use App\Creationl\Bulider\SingleImageBulider;

class HandelImages
{
    public function upload($mediaImges, $dir, $type)
    {

        $valid_ext = array("png", "jpeg", "jpg");
        // if ($type == 2) $imageFileBulider = new SingleImageBulider();
        $imageFileBulider = new ImageFileBulider();
        $imageFileBulider->initFile();
        $imageFileBulider->setFile($mediaImges);
        $imageFileBulider->setDirectory($dir);
        $imageFileBulider->setValiedeExtnions($valid_ext);
        $imageFileBulider->setFileName("name");
        /*you will get an array with all uploaded images*/
        $counter = 0;
        $url = $imageFileBulider->getFile();
        return $url;
    }

    function singleUpload($mediaImges, $dir,$flag){
        
        $valid_ext = array("png", "jpeg", "jpg");
        // if ($type == 2) $imageFileBulider = new SingleImageBulider();
        $imageFileBulider = new SingleImageBulider();
        $imageFileBulider->initFile();
        $imageFileBulider->setFile($mediaImges);
        $imageFileBulider->setDirectory($dir);
        $imageFileBulider->setValiedeExtnions($valid_ext);
        $imageFileBulider->setFileName("name");
        /*you will get an array with all uploaded images*/
        $counter = 0;
        $url = $imageFileBulider->getFile();
        return $url;
    }

    public function remove($url)
    {
        return  unlink(public_path() . $url);
    }
}
