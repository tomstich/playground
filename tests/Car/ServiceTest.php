<?php

namespace Jimdo\Car;

use PHPUnit\Framework\TestCase;

class ServiceTest extends TestCase
{
    /**
     * @test
     */
    public function itShouldReturnACar()
    {
        $service = new Service();
        $this->assertInstanceOf('\Jimdo\Car', $service->newCar('BMW'));
    }

    /**
     * @test
     */
    public function itShouldReturnBrandedCars()
    {
        $service = new Service();

        $brands = [
            'BMW' => [ 250.0, 6000.0 ],
            'Mercedes' => [ 230.0, 7000.0 ],
            'Audi' => [ 240.5, 5500.0 ],
            'fallback' => [ 180.0, 7000.0 ],
        ];

        foreach ($brands as $brand => $stats) {
            list($maxSpeed, $maxMileage) = $stats;
            $car = $service->newCar($brand);
            $this->assertEquals($maxSpeed, $car->stats()['maxSpeed']);
            $this->assertEquals($maxMileage, $car->stats()['maxMileage']);
        }
    }

    /**
     * @test
     */
    public function itShouldResetMileage()
    {
        $service = new Service();

        $carOne = $service->newCar('BMW');
        $carTwo = $service->newCar('Mercedes');

        $carOne->start();
        $carOne->drive(100.0, 100.0);

        $carTwo->start();
        $carTwo->drive(120.0, 150.0);

        $service->resetMileage($carOne);
        $this->assertEquals(0.0, $carOne->mileage());

        $service->resetMileage($carTwo);
        $this->assertEquals(0.0, $carTwo->mileage());
    }
}
