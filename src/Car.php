<?php

namespace Jimdo;

use Jimdo\Car\AuthorizedDealer;

class Car
{
    /** @var string */
    private $brand;

    /** @var string */
    private $status;

    /** @var float */
    private $speed;

    /** @var float */
    private $mileage;

    /** @var float */
    private $maxSpeed;

    /** @var float */
    private $maxMileage;

    /** @var string */
    private $secretKey;

    /**
     * @param string $brand
     * @param float $maxSpeed
     * @param float $maxMileage
     * @param AuthorizedDealer $service
     */
    public function __construct(string $brand, float $maxSpeed, float $maxMileage, AuthorizedDealer $dealer = null)
    {
        $this->brand = $brand;
        $this->status = 'parking';
        $this->speed = 0.0;
        $this->mileage = 0.0;
        $this->maxSpeed = $maxSpeed;
        $this->maxMileage = $maxMileage;

        if ($dealer !== null) {
            $this->secretKey = uniqid($brand);
            $dealer->secretKey($this, $this->secretKey);
        }
    }

    public function start()
    {
        if (!($this->status === 'driving' || $this->status === 'broken')) {
            $this->status = 'running';
        }
    }

    public function stop()
    {
        if (!($this->status === 'driving' || $this->status === 'broken')) {
            $this->status = 'parking';
        }
    }

    /**
     * @param float $delta The delta in speed
     * @param float $mileage The distance to drive
     */
    public function drive(float $delta, float $distance)
    {
        $newSpeed = $this->speed + $delta;

        if ($this->mileage + $distance > $this->maxMileage) {
            $this->status = 'broken';
            $this->mileage = $this->maxMileage;
            $newSpeed = 0.0;
        }

        if ($newSpeed > 0 && $distance > 0) {
            $this->mileage += $distance;
        }

        if ($newSpeed < 0.0) {
            $newSpeed = 0.0;
        }

        if ($newSpeed > $this->maxSpeed) {
            $newSpeed = $this->maxSpeed;
        }

        if ($this->status !== 'parking' && $newSpeed !== 0.0) {
            $this->status = 'driving';
        }

        if ($this->status != 'parking') {
            $this->speed = $newSpeed;
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

    /**
     * @return string
     */
    public function brand(): string
    {
        return $this->brand;
    }

    /**
     * @return array
     */
    public function stats(): array
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

    /**
     * @param string
     */
    public function resetMileage(string $secretKey)
    {
        if ($this->secretKey === $secretKey) {
            $this->mileage = 0.0;
        }
    }
}
