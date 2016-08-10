<?php

namespace Jimdo;

use PHPUnit\Framework\TestCase;

class CarTest extends TestCase
{
    /**
     * @test
     */
    public function itShouldStartTheCar()
    {
        $car = new Car(250.0);
        $this->assertEquals('parking', $car->status());

        $car->start();
        $this->assertEquals('running', $car->status());
    }

    /**
     * @test
     */
    public function itShouldStopTheCar()
    {
        $car = new Car(250.0);

        $car->start();
        $this->assertEquals('running', $car->status());

        $car->stop();
        $this->assertEquals('parking', $car->status());
    }

    /**
     * @test
     */
    public function itSpeedUpTheCar()
    {
        $car = new Car(250.0);

        $car->start();
        $this->assertEquals('running', $car->status());

        $car->drive(30.0, 42.0);
        $this->assertEquals('driving', $car->status());
    }

    public function itShouldSlowDownTheCar()
    {
        $car = new Car(250.0);

        $car->start();

        $car->drive(30.0, 42.0);
        $this->assertEquals(30.0, $car->status());
    }

    /**
     * @test
     */
    public function itShouldNotDriveFasterThanMaxSpeed()
    {
        $maxSpeed = 200.0;
        $car = new Car($maxSpeed);

        $car->start();

        $car->drive(220.0, 42.0);
        $this->assertEquals($maxSpeed, $car->speed());
    }

    /**
     * @test
     */
    public function itShouldLeaveStatusToRunning()
    {
        $car = new Car(250.0);

        $car->start();
        $this->assertEquals('running', $car->status());

        $car->drive(0.0, 42.0);
        $this->assertEquals('running', $car->status());
    }

    /**
     * @test
     */
    public function itShouldNotDriveBeforeCarWasStarted()
    {
        $car = new Car(250.0);

        $car->drive(10.0, 42.0);
        $this->assertEquals('parking', $car->status());
    }

    /**
     * @test
     */
    public function itShouldReturnTheSpeed()
    {
        $car = new Car(250.0);
        $this->assertEquals(0.0, $car->speed());

        $car->start();

        $car->drive(50.0, 55.0);
        $this->assertEquals(50.0, $car->speed());

        $car->drive(-25.0, 55.0);
        $this->assertEquals(25.0, $car->speed());
    }

    /**
     * @test
     */
    public function itShouldReturnTheMileage()
    {
        $car = new Car(250.0);
        $this->assertEquals(0.0, $car->mileage());

        $car->start();

        $car->drive(50.0, 120.0);
        $this->assertEquals(120.0, $car->mileage());
    }
}
