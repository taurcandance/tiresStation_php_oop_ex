<?php

namespace Client;


use Human\Human;
use Vehicle\Vehicle;
use Wallet\Wallet;


class Client extends Human
{
    public  $vehicle;
    private $wallet;
    private $replacementTires;
    private $numberCar;

    public function __construct(
        string $name,
        string $sex,
        int $age,
        float $height,
        float $weight,
        Vehicle $vehicle,
        float $money,
        string $numberCar,
        array $repTires = null
    ) {
        parent::__construct($name, $sex, $age, $height, $weight);
        $this->vehicle          = $vehicle;
        $this->wallet            = new Wallet($money);
        $this->replacementTires = $repTires;
        $this->numberCar        = $numberCar;
        $vehicle->setNumber($this->numberCar);
    }


    public function pickUpTheCar()
    {
        $auto          = $this->vehicle;
        $this->vehicle = null;

        return $auto;
    }

    public function setVehicle(Vehicle $vehicle)
    {
        $this->vehicle = $vehicle;
    }

    /**
     * Get NumberCar.
     *
     * @return string
     */
    public function getNumberCar(): string
    {
        return $this->numberCar;

    }

    /**
     * @return float
     */
    public function getWallet(){
        return $this->wallet->howMuch();
    }

    public function getPayment($money){
        $this->wallet->del($money);
    }
}