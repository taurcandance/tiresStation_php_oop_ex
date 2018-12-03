<?php

namespace StationManager;


use Client\Client;
use Human\Human;
use StationWorker\StationWorker;
use Vehicle\Vehicle;


class StationManager extends Human
{
    private $managerContract = true;
    private $ordersList = [];
    private $vehicleInRepair = [];
    private $completeOrdersList = [];

    /**
     * Get ManagerContract.
     *
     * @return bool
     */
    public function isManager(): bool
    {
        return $this->managerContract;
    }

    public function takeOrder(Client $client, Vehicle $vehicle)
    {
        $this->ordersList[] = $vehicle;
        $client->getVehicle();
    }

    public function getOrder(int $numberOfOrder)
    {
        if (is_null($this->ordersList[$numberOfOrder])) {
            return false;
        } else {
            return $this->ordersList[$numberOfOrder];
        }
    }

    public function giveTaskWorker(StationWorker $worker)
    {
        $order = array_shift($this->ordersList);
        $worker->takeOrder($order);
        $this->vehicleInRepair[$worker->getName()] = $order;
    }

    public function getBackVehicleFromWorker(StationWorker $worker)
    {
        $order                            = $worker->returnOrder();
        $this->completeOrdersList[]       = $order;
        $this->vehicleInRepair[$worker->getName()] = '+';
    }

    public function returnVehicleToClients(array $clients)
    {
        foreach ($clients as $client) {
            foreach ($this->completeOrdersList as $item)
            {
                if($client->getNumberCar() == $item->getNumber())
                {
                    $client->setVehicle($item);
                }
            }
        }
    }
}