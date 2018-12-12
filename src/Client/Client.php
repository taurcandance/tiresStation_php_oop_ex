<?php

namespace Client;


use Human\Eating;
use Vehicle\Vehicle;

class Client extends Eating
{
    public  $vehicle;
    private $money;
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
        $this->money            = $money;
        $this->replacementTires = $repTires;
        $this->numberCar        = $numberCar;
        $vehicle->setNumber($this->numberCar);
    }

    /**
     * Get Money.
     *
     * @param float $cost
     *
     * @return float
     */
    public function payCheck(float $cost): float
    {
        if (($this->money - $cost) > 0) {
            return true;
        } else {
            return false;
        }
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
}