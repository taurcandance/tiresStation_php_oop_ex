<?php

namespace Wallet;


class Wallet
{
    private $money;

    /**
     * Wallet constructor.
     *
     * @param $money
     */
    public function __construct(float $money)
    {
        $this->money = $money;
    }

    /**
     * Add Money.
     *
     * @param $money
     */
    public function add(float $money)
    {
        $this->money += $money;
    }

    /**
     * Del Money.
     *
     * @param $money
     */
    public function del(float $money)
    {
        $this->money -= $money;
    }

    /**
     * Get Money.
     *
     * @return float
     */
    public function howMuch(): float
    {
        return $this->money;
    }
}