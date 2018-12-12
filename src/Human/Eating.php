<?php

namespace Human;


use IEating\IEating;
use IPayment\IPayment;

abstract class Eating implements IEating, IPayment
{
    private $name;
    private $sex;
    private $age;
    private $height;
    private $weight;
    private $energy = 50;
    private $isClearHands = false;


    public function __construct(string $name, string $sex, int $age, float $height, float $weight)
    {
        $this->name   = $name;
        $this->sex    = $sex;
        $this->age    = $age;
        $this->height = $height;
        $this->weight = $weight;
    }

    /**
     * Get Name.
     *
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * Get Sex.
     *
     * @return string
     */
    public function getSex(): string
    {
        return $this->sex;
    }

    /**
     * Get Age.
     *
     * @return int
     */
    public function getAge(): int
    {
        return $this->age;
    }

    /**
     * Get Height.
     *
     * @return float
     */
    public function getHeight(): float
    {
        return $this->height;
    }

    /**
     * Get Weight.
     *
     * @return float
     */
    public function getWeight(): float
    {
        return $this->weight;
    }

    public function toEat($food)
    {
        if ($this->isClearHands) {
            $this->energy += 40;
        } else {
            $this->energy += 30;
        }
    }

    public function washClear($water = null)
    {
        return $this->isClearHands = true;
    }

    public function toDrink($drink)
    {
        if ($this->isClearHands) {
            $this->energy += 15;
        } else {
            $this->energy += 5;
        }
    }

    /**
     * Get Energy.
     *
     * @return int
     */
    public function getEnergy(): int
    {
        return $this->energy;
    }

    public function payment($seller, $buyer, $cost, $product = null)
    {
        // TODO: Implement payment() method.
    }

    public function checkPossibilityOfBuying($buyer, $cost)
    {
        // TODO: Implement checkPossibilityOfBuying() method.
    }


}