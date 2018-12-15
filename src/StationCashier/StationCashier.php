<?php

namespace StationCashier;


use IPayment\IPayment;

class StationCashier implements IPayment
{
    public function payment($buyer, $cost)
    {
        $buyer->getPayment($cost);
    }

    public function checkPossibilityOfBuying($buyer, $cost)
    {
        if (($buyer->getWallet() - $cost) > 0) {
            return true;
        } else {
            return false;
        }
    }
}