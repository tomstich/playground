<?php

namespace Jimdo\Car;

use Jimdo\Car as Car;

class Service implements AuthorizedDealer
{
    /** @param array */
    private $keychain;

    public function __construct()
    {
        $this->keychain = [];
    }

    /**
     * @param string $brand
     */
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

        return new Car($brand, $maxSpeed, $maxMileage, $this);
    }

    /**
     * @param Car $car
     * @param string $secretKey
     */
    public function secretKey(Car $car, string $secretKey)
    {
        $this->keychain[spl_object_hash($car)] = $secretKey;
    }

    /**
     * @param Car $car
     */
    public function resetMileage(Car $car)
    {
        $car->resetMileage($this->keychain[spl_object_hash($car)]);
    }
}
