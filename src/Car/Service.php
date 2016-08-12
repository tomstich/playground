<?php

namespace Jimdo\Car;

use Jimdo\Car as Car;

class Service
{
    public function newCar(string $brand): Car
    {
        switch ($brand) {
            case 'BMW':
                $maxSpeed = 250.0;
                $maxMileage = 6000.0;
                break;
            case 'Mercedes':
                $maxSpeed = 230.0;
                $maxMileage = 7000.0;
                break;
            case 'Audi':
                $maxSpeed = 240.5;
                $maxMileage = 5500.0;
                break;
            default:
                $maxSpeed = 180.0;
                $maxMileage = 7000.0;
        }

        return new Car($brand, $maxSpeed, $maxMileage);
    }
}
