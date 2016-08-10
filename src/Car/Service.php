<?php

namespace Jimdo\Car;

use Jimdo\Car as Car;

class Service
{
    public function newCar(float $maxSpeed, float $maxMileage): Car
    {
        return new Car($maxSpeed, $maxMileage);
    }
}
