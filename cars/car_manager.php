<?php


/**
 * Outputs debug information
 *
 * @param array $car
 */
function debug(array $car)
{
    printf("Brand: %-8s\tCurrent speed: %-8.2f\tStatus: %-8s\tMileage: %-8.2f\n"
        , $car['brand']
        , $car['currentSpeed']
        , $car['status']
        , $car['mileage']
    );
}

/**
 * Starts the car
 *
 * @param string $status
 * @return string
 */
function start(array $car): array
{
    switch ($car['status']) {
        case 'broken':
            echo "The obsolescence is reached!\n";
            break;

        case 'parking':
            $car['status'] = 'running';
            break;

        case 'running':
        case 'driving':
            echo "The car is already running!\n";
            break;
    }

    return $car;
}

/**
 * Stops the car
 *
 * @param string $status
 * @return string
 */
function stop(array $car): array
{
    $status = $car['status'];
    $aCurrentSpeed = $car['currentSpeed'];

    if ($status === 'driving' && $aCurrentSpeed > 0) {
        echo "You can not turn off the car during driving!\n";
        return $car;
    }
    $car['status'] = 'parking';
    return $car;
}

/**
 * Creates a car
 *
 * @param string $aBrand
 * @return array
 */
 function createCar(string $aBrand): array
 {
     return [
         'currentSpeed' => 0.0,
         'maxSpeed' => 220.0,
         'status' => 'parking',
         'brand' =>  $aBrand,
         'mileage' => 0.0,
         'plannedObsolescence' => obsolescence($aBrand),
         'identifier' => uniqid(),
     ];
 }

/**
 * Increases the mileAge and uses the accelerate function
 *
 * @param string $aBrand
 * @param float  $aMileage
 * @param float  $aCurrentSpeed
 * @param float  $aMaxSpeed
 * @param float  $aIncrease
 * @param float  $aDistance
 * @return array
 */
function drive(array $car, float $aIncrease, float $aDistance): array
{
    $aStatus = $car['status'];
    $aMileage = $car['mileage'];
    $aCurrentSpeed = $car['currentSpeed'];
    $aMaxSpeed = $car['maxSpeed'];

    if ($aStatus === 'broken') {
        echo "The obsolescence is reached!\n";
        return $car;
    }

    if ($aStatus === 'parking') {
        echo "The engine is not running!\n";
        return $car;
    }

    $car['status'] = 'driving';

    $newSpeed = $aCurrentSpeed + $aIncrease;

    if ($newSpeed > $aMaxSpeed) {
        echo "${newSpeed}km/h is higher than the allowed ${aMaxSpeed}km/h speed!\n";
        $newSpeed = $aMaxSpeed;
    }

    $car['mileage'] = $aMileage + $aDistance;

    if ($car['mileage']  > $car['plannedObsolescence']) {
        echo "The obsolescence is reached!\n";
        $car['mileage'] = $car['plannedObsolescence'];
        $car['status'] = 'broken';
        $car['currentSpeed'] = 0.0;
        return $car;
    }

    if ($newSpeed <= 0) {
        echo "Decreasing ${aCurrentSpeed}km/h to 0km/h\n";
        $car['status'] = 'running';
        $newSpeed = 0;
    } elseif ($newSpeed > $aCurrentSpeed) {
        echo "Increasing ${aCurrentSpeed}km/h to ${newSpeed}km/h\n";
    } elseif ($newSpeed < $aCurrentSpeed) {
        echo "Decreasing ${aCurrentSpeed}km/h to ${newSpeed}km/h\n";
    } else {
        echo "Keeping the speed of ${aCurrentSpeed}km/h\n";
    }
    $car['currentSpeed'] = $newSpeed;
    return $car;
}

/**
 * Obsolescence of a brand
 *
 * @param string $aBrand
 * @return float
 */
function obsolescence(string $aBrand): float
{
    switch ($aBrand) {
        case "BMW":
            return 5000.0;
        case "Mercedes":
            return 7500.0;
        case "VW":
            return 3200.0;
        default:
            return 4000.0;
    }
}
