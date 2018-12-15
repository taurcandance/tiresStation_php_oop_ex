<?php

namespace TiresStation;

use StationCashier\StationCashier;
use StationEquipments\StationEquipments;
use Client\Client;
use StationManager\StationManager;
use StationWorker\StationWorker;

class TiresStation
{
    const BALANCE = 200;
    const REPAIR = 60;
    const WHEEL_RIM = 40;

    private $managers = [];
    private $workers = [];
    private $cashier;
    private $equipments;
    private $moneyStorage;
    private static $instance;


    private function __construct()
    {
        $this->equipments = new StationEquipments();
    }

    public static function create()
    {
        if (empty(self::$instance)) {
            return self::$instance = new TiresStation();
        }

        return self::$instance;
    }

    public function setStationlMoneyStorage(float $money)
    {
        $this->moneyStorage = $money;
    }

    public function setManager(StationManager $manager)
    {
        $this->managers[] = $manager;
    }

    public function setWorkers(StationWorker $worker)
    {
        $this->workers[] = $worker;
    }

    public function setCashier(StationCashier $cashier)
    {
        $this->cashier = $cashier;
    }

    public function powerOn()
    {
        if ($this->equipments->isWorked() == false) {
            $this->equipments->power();
        }
    }

    public function doWork(Client $client, array $services)
    {
        $cost = 0;
        foreach ($services as $key => $value)
        {
            if($value == 1) { $cost+= self::BALANCE;}
            if($value == 2) { $cost+= self::REPAIR;}
            if($value == 3) { $cost+= self::WHEEL_RIM;}
        }
        if ($this->cashier->checkPossibilityOfBuying($client, $cost)) {
            $manager = array_pop($this->managers);
            $worker  = array_pop($this->workers);
            $manager->createOrder($client);
            $manager->giveTaskToWorker($worker);
            $manager->returnVehicleAfterRepairFromWorker($worker);
            $this->cashier->payment($client, $cost);
            $this->setStationlMoneyStorage($this->moneyStorage + $cost);
            $manager->returnVehicleToClients([$client]);
            array_push($this->managers, $manager);
            array_push($this->workers, $worker);

        } else {
            echo $client->getName().' No have money to be payment this services';
        }
    }
}