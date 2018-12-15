<?php

namespace IPayment;


interface IPayment
{
    public function payment($buyer, $cost);
    public function checkPossibilityOfBuying($buyer, $cost);
}