<?php

namespace Jimdo;

use PHPUnit\Framework\TestCase;

class CarTest extends TestCase
{
    /** @var Car */
    private $car;

    public function setUp()
    {
        $maxSpeed = 250.0;
        $maxMileage = 1000.0;
        $this->car = new Car($maxSpeed, $maxMileage);
    }

    /**
     * @test
     */
    public function itShouldStartTheCar()
    {
        $this->assertEquals('parking', $this->car->status());

        $this->car->start();
        $this->assertEquals('running', $this->car->status());
    }

    /**
     * @test
     */
    public function itShouldStopTheCar()
    {
        $this->car->start();
        $this->assertEquals('running', $this->car->status());

        $this->car->stop();
        $this->assertEquals('parking', $this->car->status());
    }

    /**
     * @test
     */
    public function itShouldDriveTheCar()
    {
        $this->car->start();
        $this->assertEquals('running', $this->car->status());

        $this->car->drive(30.0, 42.0);
        $this->assertEquals('driving', $this->car->status());
    }

    /**
     * @test
     */
    public function itShouldNotDriveWithNegativeSpeed()
    {
        $this->car->start();

        $this->car->drive(-10.0, 42.0);
        $this->assertEquals(0.0, $this->car->speed());
    }

    /**
     * @test
     */
    public function itShouldNotDriveFasterThanMaxSpeed()
    {
        $maxSpeed = 200.0;
        $maxMileage = 1000.0;
        $car = new Car($maxSpeed, $maxMileage);

        $car->start();

        $car->drive(220.0, 42.0);
        $this->assertEquals($maxSpeed, $car->speed());
    }

    /**
     * @test
     */
    public function itShouldLeaveStatusToRunning()
    {
        $this->car->start();
        $this->assertEquals('running', $this->car->status());

        $this->car->drive(0.0, 42.0);
        $this->assertEquals('running', $this->car->status());
    }

    /**
     * @test
     */
    public function itShouldNotDriveBeforeCarWasStarted()
    {
        $this->car->drive(10.0, 42.0);
        $this->assertEquals('parking', $this->car->status());
    }

    /**
     * @test
     */
    public function itShouldReturnTheSpeed()
    {
        $this->assertEquals(0.0, $this->car->speed());

        $this->car->start();

        $this->car->drive(50.0, 55.0);
        $this->assertEquals(50.0, $this->car->speed());

        $this->car->drive(-25.0, 55.0);
        $this->assertEquals(25.0, $this->car->speed());
    }

    /**
     * @test
     */
    public function itShouldReturnTheMileage()
    {
        $this->assertEquals(0.0, $this->car->mileage());

        $this->car->start();

        $this->car->drive(50.0, 120.0);
        $this->assertEquals(120.0, $this->car->mileage());
    }

    /**
     * @test
     */
    public function itShouldIgnoreNegativeDistances()
    {
        $this->assertEquals(0.0, $this->car->mileage());

        $this->car->start();

        $this->car->drive(50.0, -120.0);
        $this->assertEquals(0.0, $this->car->mileage());
    }

    /**
     * @test
     */
    public function itShouldNotDriveFurtherThanPlannedObsolesence()
    {
        $maxMileage = 5000.0;
        $car = new Car(250.0, $maxMileage);
        $this->assertEquals(0.0, $car->mileage());

        $car->start();

        $car->drive(180.0, 5000.1);
        $this->assertEquals($maxMileage, $car->mileage());
    }

    /**
     * @test
     */
    public function itShouldStopDrivingIfPlannedObsolescenceIsReached()
    {
        $maxMileage = 5000.0;
        $car = new Car(250.0, $maxMileage);
        $car->start();

        $car->drive(180.0, 5100.0);
        $this->assertEquals(0.0, $car->speed());
        $this->assertEquals('broken', $car->status());
    }
}
