<?php

namespace IEating;


interface IEating
{
    public function toEat($food);
    public function toDrink($drink);
    public function washClear($water = null);
}