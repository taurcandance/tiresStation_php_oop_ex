<?php

namespace StationManager;


use Client\Client;
use Human\Human;
use Order\Order;
use StationWorker\StationWorker;
use Exception;
use SplQueue;

class StationManager extends Human
{
    private $managerContract = true;
    private $ordersQueue;           /* необработанные заказы в очередь */
    private $vehicleList = [];      /* площадка для хранения */
    private $ordersArchive = [];    /* архив заказов */

    public function __construct(string $name, string $sex, int $age, float $height, float $weight)
    {
        parent::__construct($name, $sex, $age, $height, $weight);
        $this->ordersQueue = new SplQueue();
    }

    /**
     * Get ManagerContract.
     *
     * @return bool
     */
    public function isManager(): bool
    {
        return $this->managerContract;
    }

    /**/
    public function createOrder(Client $client)
    {
        $order = new Order($client, 'accepted');
        $order->setOrderManager($this->getName());
        $this->ordersQueue->enqueue($order);
        $this->vehicleList[$order->getOrderNumber()] = $client->pickUpTheCar(); /* машина как объект, на площадку */
    }

    /**/
    public function giveTaskToWorker(StationWorker $worker)
    {
        try {
            if ($worker->isBusy()) {
                throw new Exception('all workers is busy');
            }
        } catch (Exception $exception) {
            echo 'Выброшено исключение -', $exception->getMessage(), "\n";
        }
        $order   = $this->ordersQueue->dequeue();
        $vehicle = $this->vehicleList[$order->getOrderNumber()];
        $worker->getWork($vehicle);
        $this->vehicleList[$order->getOrderNumber()] = null;
        $order->changeStatus('inProgress');
        $order->setWorkerName($worker->getName());
        $this->ordersArchive[$order->getOrderNumber()] = $order;
    }

    /**/
    public function returnVehicleAfterRepairFromWorker(StationWorker $worker)
    {
        $currOrder = null;
        foreach ($this->ordersArchive as $order) {
            if ($order->getStatus() == 'inProgress' && $order->getWorker() == $worker->getName()) {
                $currOrder = $order;
            }
        }
        $currOrder->changeStatus('completed');
        $this->vehicleList[$currOrder->getOrderNumber()] = $worker->returnRepairedVehicle();
    }

    public function returnVehicleToClients(array $clients)
    {
        $repairedVehiclesList = array_filter(
            $this->ordersArchive,
            function ($order) {
                if ($order->getStatus() == 'completed') {
                    return true;
                }
                return false;
            }
        );

        array_walk(
            $repairedVehiclesList,
            function ($order) use ($clients) {
                foreach ($clients as $client) {
                    if ($client->getName() == $order->getClientName()) {
                        $client->setVehicle($this->vehicleList[$order->getOrderNumber()]);
                        $this->vehicleList[$order->getOrderNumber()] = null;
                    }
                }
            }
        );
    }
}