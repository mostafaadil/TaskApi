<?php
/*
 * @Author: your name
 * @Date: 2022-02-15 14:32:42
 * @LastEditTime: 2022-02-16 14:16:41
 * @LastEditors: Please set LastEditors
 * @Description: 打开koroFileHeader查看配置 进行设置: https://github.com/OBKoro1/koro1FileHeader/wiki/%E9%85%8D%E7%BD%AE
 * @FilePath: \ElctroStoreApp\app\Creationl\Bulider\ViedoFileBulider.php
 */

namespace App\Creationl\Bulider;

use App\Creationl\Bulider\Models\File;
use App\Creationl\Bulider\Models\ViedoFile;

class ViedoFileBulider implements FileBuliderInterface
{

    private $type;
    private $path;
    private $name;
    private $File;
    private $exsations;
    private $shortpath;
    private $finlePtah;
    private $random;
    /** init  is createing an object from File Class that holding the uploaing Methods*/
    public function initFile()
    {
        $this->type = new File(); /* inti File object*/
    }

    public function setFile($File)
    {
        return $this->File = $File; /*set The tregted Upload file */
    }

    public function setValiedeExtnions($exsations)
    {
        $this->exsations = $exsations;
        return $this->exsations; /*set the vailed  */
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
        return $this->type->uploadFile($this->File, $this->name, $this->finlePtah, $this->exsations);
    }
}
