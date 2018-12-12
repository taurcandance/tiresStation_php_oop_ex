<?php

namespace StationWorker;


use Human\Eating;

class StationWorker extends Eating
{
    static private $workerContract = true;
    private $vehicleInWork = [];


    public static function isWorker(): bool
    {
        return self::$workerContract;
    }

    public function getWork($order)
    {
        $this->vehicleInWork[] = $order;
    }

    public function returnRepairedVehicle()
    {
        return array_shift($this->vehicleInWork);
    }

    public function isBusy()
    {
        if (count($this->vehicleInWork) > 0) {
            return true;
        }

        return false;
    }

}