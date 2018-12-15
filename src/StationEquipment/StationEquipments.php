<?php

namespace StationEquipments;


class StationEquipments
{
    private $isWorked;


    public function __construct()
    {
        $this->isWorked = false;
    }

    public function power()
    {
        return $this->isWorked = true;
    }

    /**
     * Get isWorked.
     *
     * @return bool
     */
    public function isWorked(): bool
    {
        return $this->isWorked;
    }

}