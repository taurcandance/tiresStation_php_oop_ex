<?php

namespace Order;


use Client\Client;

class Order
{
    private $status = '';
    private $manager = '';
    private $worker = '';
    private $dateOrderCreated;
    private $clientName;
    private $vehicleNumber;
    private $vehicleBrand;
    private $vehicleColor;
    private $orderNumber;
    static public $countOrders;


    public function __construct(Client $client, string $status = 'accepted')
    {
        self::$countOrders++;
        $this->orderNumber      = self::$countOrders;
        $this->dateOrderCreated = self::setOrderTimeCreated();
        $this->status           = $status; // completed, inProgress, accepted
        $this->clientName       = $client->getName();
        $this->vehicleNumber    = $client->vehicle->getNumber();
        $this->vehicleBrand     = $client->vehicle->getCarBrand();
        $this->vehicleColor     = $client->vehicle->getColor();
    }

    static private function setOrderTimeCreated()
    {
        return date(DATE_RFC822);
    }

    public function setOrderManager($managersName)
    {
        $this->manager = $managersName;
    }

    public function setWorkerName($workersName)
    {
        $this->worker = $workersName;
    }

    public function changeStatus(string $status)
    {
        $this->status = $status;
    }

    /**
     * Get Status.
     *
     * @return string
     */
    public function getStatus(): string
    {
        return $this->status;
    }

    /**
     * Get Worker.
     *
     * @return string
     */
    public function getWorker(): string
    {
        return $this->worker;
    }

    /**
     * Get Manager.
     *
     * @return string
     */
    public function getManager(): string
    {
        return $this->manager;
    }

    /**
     * Get ClientName.
     *
     * @return string
     */
    public function getClientName(): string
    {
        return $this->clientName;
    }

    /**
     * Get VehicleNumber.
     *
     * @return mixed
     */
    public function getVehicleNumber()
    {
        return $this->vehicleNumber;
    }

    /**
     * Get VehicleBrand.
     *
     * @return string
     */
    public function getVehicleBrand(): string
    {
        return $this->vehicleBrand;
    }

    /**
     * Get VehicleColor.
     *
     * @return string
     */
    public function getVehicleColor(): string
    {
        return $this->vehicleColor;
    }

    /**
     * Get OrderNumber.
     *
     * @return int
     */
    public function getOrderNumber(): int
    {
        return $this->orderNumber;
    }
}