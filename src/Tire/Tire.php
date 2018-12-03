<?php

namespace Tire;


use BaseTire\BaseTire;
use Client\Client;

class Tire extends BaseTire
{

    public function __construct(string $brand, string $season, string $size, bool $spikes = null, float $weight = null, string $materials = null)
    {
        parent::__construct($brand, $season, $size, $spikes, $weight, $materials);
    }
}