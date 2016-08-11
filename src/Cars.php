<?php

// Klasse
class Car
{
    /** @var string */
    private $brand;

    /** @var float */
    private $mileage;

    /** @var float */
    private $maxSpeed;

    /** @var float */
    private $speed;

    /** @var float */
    private $maxMileage;

    /** @var string */
    private $status;
    /**
     * @param string $brand
     * @param float $maxSpeed
     * @param float $maxMileage
     */
    public function __construct(string $brand, float $maxSpeed)
    {
        $this->brand = $brand;
        $this->maxSpeed = $maxSpeed;
        // Was lieber benutzen?
        // $this->maxMilage = $this->obsolescence();
        // $this->obsolescence();
        $this->maxMileage = $this->obsolescence();
        $this->speed = 0.0;
        $this->mileage = 0.0;
        $this->status = 'parking';
    }

    public function start()
    {
        switch ($this->status) {
            case 'broken':
                echo "The obsolescence is reached!\n";
                break;

            case 'parking':
                $this->status = 'running';
                break;

            case 'running':
            case 'driving':
                echo "The car is already running!\n";
                break;
        }
    }


    public function stop()
    {
        if ($this->status === 'driving' && $this->speed > 0.0) {
            echo "You can not turn off the car during driving!\n";
        } else {
            $this->status = 'parking';
        }
    }

    private function obsolescence()
    {
        switch ($this->brand) {
            case "BMW":
                $this->maxMileage = 5000.0;
                break;
            case "Mercedes":
                $this->maxMileage = 7500.0;
                break;
            case "VW":
                $this->maxMileage = 3200.0;
                break;
            case "Tesla":
                $this->maxMileage = 1500.0;
                break;
            default:
                $this->maxMileage = 3000.0;
                break;
        }
    }


    public function drive(float $delta, float $distance)
    {
        switch ($this->status) {
            case 'broken':
                echo "The obsolenscence is reached!\n";
                break;

            case 'parking':
                echo "The engine is not running!\n";
                break;

            default:
                $this->status = 'driving';
                break;
        }

        $newSpeed = $this->speed + $delta;

        if ($newSpeed > $this->maxSpeed) {
            echo "${newSpeed}km/h is higher than the allowed {$this->maxSpeed}km/h speed!\n";
            $newSpeed = $this->maxSpeed;
        }

        $this->mileage += $distance;

        if ($this->mileage > $this->maxMileage) {
            echo "The obsolescence is reached!\n";
            $this->mileage = $this->maxMileage;
            $this->status = 'broken';
            $this->speed = 0.0;
            return;
        }

        if ($newSpeed <= 0) {
            echo "Decreasing $this->speed km/h to 0km/h\n";
            $this->status = 'running';
            $newSpeed = 0;
        } elseif ($newSpeed > $this->speed) {
            echo "Increasing $this->speed km/h to ${newSpeed}km/h\n";
        } elseif ($newSpeed < $this->speed) {
            echo "Decreasing $this->speed km/h to ${newSpeed}km/h\n";
        } else {
            echo "Keeping the speed of $this->speed km/h\n";
        }

        $this->speed = $newSpeed;
    }


    function debug()
    {
        printf("Brand: %-8s\tCurrent speed: %-8.2f\tStatus: %-8s\tMileage: %-8.2f\n"
            , $this->brand
            , $this->speed
            , $this->status
            , $this->mileage
        );
    }

}







// Objekt
$jennysCar = new Car('BMW', 250.0);
$tomsCar = new Car('Tesla', 245.0);

$jennysCar->debug();

$jennysCar->start();
$jennysCar->debug();

$jennysCar->drive(50.0, 100.0);
$jennysCar->debug();

$jennysCar->drive(500.0, 100.0);
$jennysCar->debug();

$jennysCar->stop();
$jennysCar->debug();

///var_dump($jennysCar);
//var_dump($tomsCar);

//
//
// var_dump($jennysCar);
// var_dump($tomsCar);
