<?php

namespace IPayment;


interface IPayment
{
    public function payment($seller, $buyer, $cost, $product = null);
    public function checkPossibilityOfBuying($buyer, $cost);
}