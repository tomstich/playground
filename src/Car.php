<?php

namespace Jimdo;

class Car
{
    /** @var string */
    private $status;

    /** @var float */
    private $speed;

    /** @var float */
    private $mileage;

    public function __construct($maxSpeed)
    {
        $this->status = 'parking';
        $this->speed = 0.0;
        $this->mileage = 0.0;
        $this->maxSpeed = $maxSpeed;
    }

    public function start()
    {
        $this->status = 'running';
    }

    public function stop()
    {
        $this->status = 'parking';
    }

    /**
     * @param float $delta The delta in speed
     * @param float $mileage The distance to drive
     */
    public function drive(float $delta, float $distance)
    {
        $newSpeed = $this->speed + $delta;

        if ($newSpeed < 0.0) {
            $newSpeed = 0.0;
        }

        if ($newSpeed > $this->maxSpeed) {
            $newSpeed = $this->maxSpeed;
        }

        if ($this->status !== 'parking' && $newSpeed !== 0.0) {
            $this->status = 'driving';
            $this->speed = $newSpeed;
            $this->mileage += $distance;
        }
    }

    /**
     * @return float
     */
    public function speed(): float
    {
        return $this->speed;
    }

    /**
     * @return string
     */
    public function status(): string
    {
        return $this->status;
    }

    /**
     * @return float
     */
    public function mileage(): float
    {
        return $this->mileage;
    }
}
