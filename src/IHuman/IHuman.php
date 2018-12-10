<?php


namespace IHuman;


interface IHuman
{
    public function toEat($food);
    public function toDrink($drink);
    public function washClear($water = null);
}