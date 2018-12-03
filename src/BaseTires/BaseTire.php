<?php

namespace BaseTire;


abstract class BaseTire
{
    private $materials = 'rubber';
    private $brand;
    private $season;
    private $size;
    private $weight;
    private $spikes = false;

    /**
     * BaseTires constructor.
     *
     * @param $materials
     * @param $brand
     * @param $season
     * @param $size
     * @param $weight
     * @param $spikes
     */
    public function __construct(
        string $brand,
        string $season,
        string $size,
        bool $spikes = null,
        float $weight = null,
        string $materials = null
    ) {
        $this->materials = $materials;
        $this->brand     = $brand;
        $this->season    = $season;
        $this->size      = $size;
        $this->weight    = $weight;
        $this->spikes    = $spikes;
    }

}