<?php
/*
 * @Author: your name
 * @Date: 2022-02-13 21:45:01
 * @LastEditTime: 2022-02-13 22:00:48
 * @LastEditors: Please set LastEditors
 * @Description: 打开koroFileHeader查看配置 进行设置: https://github.com/OBKoro1/koro1FileHeader/wiki/%E9%85%8D%E7%BD%AE
 * @FilePath: \ElctroStoreApp\app\Creationl\CoupenDiscount.php
 */

namespace App\Creationl;

use App\Creationl\DiscountInterface;

class CoupenDiscount implements DiscountInterface
{
    private $price;

    public function __construct($price)
    {
        $this->price = $price;
    }

    public  function discount()
    {
        return $this->price * 0.15;
    }
}
