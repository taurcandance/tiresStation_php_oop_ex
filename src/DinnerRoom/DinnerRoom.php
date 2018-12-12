<?php

namespace DinnerRoom;

use IHuman\IEating;


class DinnerRoom
{
    private $food;
    private $drinks = [];
    private $products = [];


    public function __construct($drinks, $products)
    {
        $this->drinks   = $drinks;
        $this->products = $products;
    }

    public function feed(IEating $dinnerClient)
    {
        if (is_null($this->food)) {
            try {
                throw new \Exception('No have food, wait when prepare...');
            } catch (\Exception $exception) {
                echo 'Произошла ошибка -', $exception->getMessage(), "\n";
            }
        } else {
            $dinnerClient->toEat(array_pop($this->food));
        }
    }

    public function giveADrink(IEating $dinnerClient)
    {
        $dinnerClient->toDrink(array_pop($this->drinks));
    }

    public function cookFood()
    {
        return $this->food = $this->products;
    }

    public function washAndClear(IEating $dinnerClient)
    {
        $dinnerClient->washClear();
    }
}