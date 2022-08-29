<?php

namespace App\Creationl\Bulider;

class UniqueKeysGenerator
{
    public function generateUniqueKey($length)
    {
        /*generate keys*/
        $uniqueKey = strtoupper(substr(sha1(microtime()), rand(0, 5), $length));

        $uniqueKey  = implode("", str_split($uniqueKey, 50));

        return ($uniqueKey);
    }

    public function createOtp()
    {
        $dateString = date('Ymd'); //Generate a datestring.
        $branchNumber = 101; //Get the branch number somehow.
        $receiptNumber = 1;  //You will query the last receipt in your database 
        //and get the last $receiptNumber for that branch and add 1 to it.;

        if ($receiptNumber < 9999) {

            $receiptNumber = $receiptNumber + 1;
        } else {
            $receiptNumber = 1;
        }
    }
}
