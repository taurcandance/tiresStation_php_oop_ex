<?php

namespace StationWorker;


use Human\Human;

class StationWorker extends Human
{
    static private $workerContract = true;
    private $vehicleInWork = [];


    public static function isWorker(): bool
    {
        return self::$workerContract;
    }

    public function takeOrder($order)
    {
        $this->vehicleInWork[] = $order;
    }

    public function returnOrder()
    {
        return array_shift($this->vehicleInWork);
    }

}