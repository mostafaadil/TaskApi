<?php
/*
 * @Author: your name
 * @Date: 2022-02-15 15:20:15
 * @LastEditTime: 2022-02-16 14:18:19
 * @LastEditors: Please set LastEditors
 * @Description: 打开koroFileHeader查看配置 进行设置: https://github.com/OBKoro1/koro1FileHeader/wiki/%E9%85%8D%E7%BD%AE
 * @FilePath: \ElctroStoreApp\app\Creationl\Bulider\Models\File.php
 */

namespace App\Creationl\Bulider\Models;

use App\Creationl\Bulider\UniqueKeysGenerator;

class File
{
    private $path;
    private $name;
    private $File;
    private $exsations = [];

    public function uploadFile($File, $FileName, $direcotry, $exstions)
    {
        $valid_extensions = array("png", "jpeg", "jpg");
        $filename = $File['name'];
        $ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
        $name = UniqueKeysGenerator::generateUnquieKey(20) . '.' . $ext;;
        $location = public_path() . $direcotry . "/" .  $name;
        $response = '';
        $imageFileType = pathinfo($location, PATHINFO_EXTENSION);
        $imageFileType = strtolower($imageFileType);
        /* Valid extensions */
        $ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
        /* Check file extension */
        if (in_array(strtolower($imageFileType), $valid_extensions)) {
            /* Upload file */
            if (move_uploaded_file($File['temp'], $location)) {
                $response = $location;
                return $direcotry . "/" . $name;
            }
        }
    }


    public function uploadMultipleMedia($targetedFile, $direcotry, $valid_extensions)
    {

        $countfiles = count($targetedFile['name']);
        $upload_location = $direcotry;
        $files_arr = array();
        // Loop all files
        for ($index = 0; $index < $countfiles; $index++) {
            if (isset($targetedFile['name'][$index]) && $targetedFile['name'][$index] != '') {
                // File name

                $theMiliName = $direcotry . '/' . UniqueKeysGenerator::generateUnquieKey(20);
                $filename = $targetedFile['name'][$index];
                // Get extension
                $ext = strtolower(pathinfo($targetedFile['name'][$index], PATHINFO_EXTENSION));
                // Valid image extension
                $valid_ext = array("png", "jpeg", "jpg");
                if (in_array($ext, $valid_ext)) {
                    $path = public_path() . '/' . $theMiliName . '.' . $ext;
                    if (move_uploaded_file($targetedFile['temp'][$index], $path)) {
                        $files_arr[] = $theMiliName . '.' . $ext;
                    }
                }
            }
        }
        return $files_arr;
    }


    public function createPhotoUrl($File, $FileName, $direcotry, $exstions)
    {
        $image = $File;
        $photoName = $FileName . '.' . $image->getClientOriginalExtension();
        $imageFileType = pathinfo($photoName, PATHINFO_EXTENSION);
        if (in_array(strtolower($imageFileType), $exstions)) {
            //replace with saving paths 
            $destionPath =  $direcotry . "/" .  $photoName; //this the url of saveing 
            $image->move('D:/mostafa project/web desings/ElctroStoreApp/public' . $destionPath, $photoName);

            return  $destionPath;
        }
    }


    function milliseconds()
    {
        $mt = explode(' ', microtime());
        return ((int)$mt[1]) * 1000 + ((int)round($mt[0] * 1000));
    }
}
