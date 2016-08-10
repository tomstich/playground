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
        $maxSpeed = 220.0;
        $maxMileage = 5000.0;

        $this->assertInstanceOf('\Jimdo\Car', $service->newCar($maxSpeed, $maxMileage));
    }
}
