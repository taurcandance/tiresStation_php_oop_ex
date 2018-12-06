<?php

namespace Vehicle;


use Tire\Tire;

class Vehicle
{
    private $tires = [];
    private $carBrand;
    private $tiresSize;
    private $color;
    private $number;

    public function __construct(string $carBrand, string $tiresSize, string $color, Tire $tires)
    {
        $this->carBrand  = $carBrand;
        $this->tiresSize = $tiresSize;
        $this->color     = $color;
        for ($i = 0; $i < 4; $i++) {
            $this->tires[] = $tires;
        }
    }

    /**
     * Get Number.
     *
     * @return mixed
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * @param mixed $number
     */
    public function setNumber($number): void
    {
        $this->number = $number;
    }

    /**
     * Get CarBrand.
     *
     * @return string
     */
    public function getCarBrand(): string
    {
        return $this->carBrand;
    }

    /**
     * Get Color.
     *
     * @return string
     */
    public function getColor(): string
    {
        return $this->color;
    }

}