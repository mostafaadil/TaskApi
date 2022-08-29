<?php

namespace App\Creationl;

//use App\Creationl\CoupenDiscount;
//use App\Creationl\LongTermDiscount;

class DiscountAbstractFactory
{
    private $price;
    private $discount;
    public function __construct($price)
    {
        $this->price = $price;
    }

    public function createCoupenDiscount()
    {
        //return $this->price;
        $prepare = new CoupenDiscount(2000);
        return $prepare->discount();
    }


    public function createLongTermDiscount()
    {
        $prepare = new LongTermDiscount(2000, 10);
        return $prepare->discount();
    }
}
