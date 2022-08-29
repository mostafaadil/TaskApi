<?php

namespace App\Creationl;

use App\Creationl\DiscountInterface;


class LongTermDiscount implements DiscountInterface
{

    private $price;
    private $captel;

    public function __construct($price, $captel)
    {
        $this->price = $price;
        $this->captel = $captel;
    }

    public function discount()
    {
        $result= ($this->captel - $this->price) * 0.5;
        return $result;
    }
}
