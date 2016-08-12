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

    public function __construct(string $brand, float $maxSpeed)
    {
        $this->status = 'parking';
        $this->maxSpeed = $maxSpeed;
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
        $this->status = 'running';
    }

    public function stop()
    {
        $this->status = 'parking';
    }

    /**
     * @param float
     */
    public function drive(float $speed)
    {
        $this->status = 'driving';
        $this->speed = $speed;
        if ($this->speed > $this->maxSpeed) {
            $this->speed = $this->maxSpeed;
        }
    }

    /**
     * @return float
     */
    public function speed(): float
    {
        return $this->speed;
    }
}
