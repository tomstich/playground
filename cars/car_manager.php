<?php

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
function stop(array $myCar): string
{
    $status = $myCar['status'];
    $aCurrentSpeed = $myCar['currentSpeed'];
    if ($status === 'parking' && $aCurrentSpeed > 0) {
        echo "You can not turn off the car during driving!\n";
        return $status = 'driving';
    }
    return $status = 'parking';
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
function drive(string $aBrand, float $aMileage, float $aCurrentSpeed, float $aMaxSpeed, float $aIncrease, float $aDistance, string $aStatus): array
{
    if ($aStatus === 'broken') {
        echo "The obsolescence is reached!\n";
        return [$aMileage, $aCurrentSpeed, $aStatus];
    }

    if ($aStatus === 'parking') {
        echo "The engine is not running!\n";
        return [$aMileage, $aCurrentSpeed, $aStatus];
    }

    $status = 'driving';
    $mileage = $aMileage + $aDistance;
    $status = $aStatus;
    $newSpeed = $aCurrentSpeed + $aIncrease;

    if ($newSpeed > $aMaxSpeed) {
        echo "${newSpeed}km/h is higher than the allowed ${aMaxSpeed}km/h speed!\n";
        $newSpeed = $aMaxSpeed;
    }

    if ($mileage > obsolescence($aBrand)) {
        echo "The obsolescence is reached!\n";
        $status = 'broken';
        $newSpeed = 0.0;
        return [$mileage, $newSpeed, $status];
    }

    if ($newSpeed <= 0) {
        echo "Decreasing ${aCurrentSpeed}km/h to 0km/h\n";
        $status = 'running';
        $newSpeed = 0;
    } elseif ($newSpeed > $aCurrentSpeed) {
        echo "Increasing ${aCurrentSpeed}km/h to ${newSpeed}km/h\n";
    } elseif ($newSpeed < aCurrentSpeed) {
        echo "Decreasing ${aCurrentSpeed}km/h to ${newSpeed}km/h\n";
    } else {
        echo "Keeping the speed of ${aCurrentSpeed}km/h\n";
    }

    return [$mileage, $newSpeed, $status];
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
