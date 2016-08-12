<?php

namespace Jimdo;

class Car
{
    /** @var string */
    private $status;

    /** @var float */
    private $speed;

    /** @var float */
    private $maxSpeed;

    /** @var float */
    private $mileage;

    /** @var float */
    private $maxMileage;

    /** @var string */
    private $brand;

    public function __construct(string $brand, float $maxSpeed, float $maxMileage)
    {
        $this->status = 'parking';
        $this->maxSpeed = $maxSpeed;
        $this->speed = 0.0;
        $this->mileage = 0.0;
        $this->maxMileage = $maxMileage;
        $this->brand = $brand;
    }

    /**
     * @return string
     */
    public function status(): string
    {
        return $this->status;
    }

    public function start()
    {
        switch ($this->status) {
            case 'broken':

            case 'running':

            case 'driving':
                break;

            case 'parking':
                $this->status = 'running';
                break;
        }
    }

    public function stop()
    {
        if ($this->status === 'driving' || $this->status === 'broken') {
            return;
        } else {
            $this->status = 'parking';
        }
    }

    /**
     * @param float
     * @param float
     */
    public function drive(float $speed, float $mileage)
    {
        if ($this->status === 'running' || $this->status === 'driving') {
            $this->status = 'driving';
            $this->speed += $speed;
            if ($mileage >= 0 && $speed > 0) {
                $this->mileage += $mileage;
            }
            if ($this->speed > $this->maxSpeed) {
                $this->speed = $this->maxSpeed;
            }
            if ($this->speed <= 0) {
                $this->speed = 0.0;
                $this->status = 'running';
            }
            if ($this->mileage > $this->maxMileage) {
                $this->mileage = $this->maxMileage;
                $this->status = 'broken';
                $this->speed = 0.0;
            }
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
     * @return float
     */
    public function mileage()
    {

        return $this->mileage;
    }

    /**
     * @return string
     */
    public function brand()
    {
        return $this->brand;
    }

    /**
     * @return array
     */
    public function stats()
    {
        return [
            'brand' => $this->brand,
            'maxSpeed' => $this->maxSpeed,
            'maxMileage' => $this->maxMileage,
            'speed' => $this->speed,
            'mileage' => $this->mileage,
            'status' => $this->status,
        ];
    }
}
