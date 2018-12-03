<?php

namespace StationEquipments;


class StationEquipments
{
    private $isWorked = false;

    public function power()
    {
        return ! $this->isWorked;
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