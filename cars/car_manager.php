<?php

/**
 * Starts the car
 *
 * @param string $status
 * @return string
 */
function start(string $status): string
{
    if ($status === 'broken') {
        echo "The obsolescence is reached!\n";
        return $status;
    };

    if ($status === 'running' || $status === 'driving') {
        echo "The car is already running!\n";
    }

    return $status = 'running';
}

/**
 * Stops the car
 *
 * @param string $status
 * @return string
 */
function stop(string $status, float $aCurrentSpeed): string
{
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

    $mileage = $aMileage + $aDistance;
    $status = $aStatus;

    $newSpeed = $aCurrentSpeed + $aIncrease;

    if ($mileage > obsolescence($aBrand)) {
        echo "The obsolescence is reached!\n";
        $status = 'broken';
        $newSpeed = 0.0;
        return [$mileage, $newSpeed, $status];
    }

    if ($aIncrease >= 0) {
        if ($newSpeed > $aMaxSpeed) {
            echo "${newSpeed}km/h is higher than the allowed ${aMaxSpeed}km/h speed!\n";
            $status = 'driving';
            $newSpeed = $aMaxSpeed;
        } else {
            echo "Increasing ${aCurrentSpeed}km/h to ${newSpeed}km/h\n";
            $status = 'driving';
        }

    } else {
        if ($newSpeed < 0) {
            echo "Decreasing ${aCurrentSpeed}km/h to 0km/h\n";
            $status = 'running';
            $newSpeed = 0;
        } else {
            echo "Decreasing ${aCurrentSpeed}km/h to ${newSpeed}km/h\n";
            $status = 'driving';
        }
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
    }
    return 4000.0;
}

/**
 * Accelerates the car
 *
 * @param float $currentSpeed
 * @param float $increase
 * @param float $MaxSpeed
 * @return array
 */
function accelerate(float $currentSpeed, int $increase, float $maxSpeed, string $status): array
{
    $oldSpeed = $currentSpeed;
    $newSpeed = $currentSpeed + $increase;

    if ($newSpeed > $maxSpeed) {
        echo "${newSpeed}km/h is higher than the allowed ${maxSpeed}km/h speed!\n";
        $status = 'driving';
        return [$maxSpeed, $status];
    } else {
        echo "Increasing ${oldSpeed}km/h to ${newSpeed}km/h\n";
        $status = 'driving';
        return [$newSpeed, $status];
    }
}

/**
 * Decelerates the car
 *
 * @param float $currentSpeed
 * @param float $decrease
 * @return array
 */
function decelerate(float $currentSpeed, int $decrease, string $status): array
{
    $newSpeed = $currentSpeed - $decrease;
    if ($newSpeed < 0) {
        echo "Decreasing ${currentSpeed}km/h to 0km/h\n";
        $status = 'running';
        return [$currentSpeed, $status];
    }

    echo "Decreasing ${currentSpeed}km/h to ${newSpeed}km/h\n";
    $status = 'driving';
    return [$newSpeed, $status];
}
