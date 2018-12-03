<?php

namespace Human;


abstract class Human
{
    private $name;
    private $sex;
    private $age;
    private $height;
    private $weight;


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

}