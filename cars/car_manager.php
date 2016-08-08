<?php
/**
 * Starts the car
 *
 * @param string $status
 *
 */

function start(string $status): string
{
    return $status = 'running';
}

/**
 * Stops the car
 *
 * @param string $status
 *
 */

function stop(string $status): string
{
    return $status = 'parking';
}

/**
 * Increases the mileAge and uses the accelerate function
 *
 * @param float $aMileage
 * @param float $aCurrentSpeed
 * @param float $aMaxSpeed
 * @param float $aIncrease
 * @param float $aDistance
 *
 */

function drive(float $aMileage, float $aCurrentSpeed, float $aMaxSpeed, float $aIncrease, float $aDistance): array
{
    $mileage = $aMileage + $aDistance;
    $currentSpeed = accelerate($aCurrentSpeed, $aIncrease, $aMaxSpeed);
    return [$mileage, $currentSpeed];
}

/**
 * Obsolescence of a brand
 *
 * @param string $aBrand
 *
 */

function obsolescence(string $aBrand): float
{
    if ($aBrand === 'BMW') {
        return 5000.0;
    }

    if ($aBrand === 'Mercedes') {
        return 7500.0;
    }

    if ($aBrand === 'VW') {
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
 *
 */

function accelerate(float $currentSpeed, int $increase, float $maxSpeed): float
{
    $oldSpeed = $currentSpeed;
    $newSpeed = $currentSpeed + $increase;

    if ($newSpeed > $maxSpeed) {
        echo "${newSpeed}km/h is higher than the allowed ${maxSpeed}km/h speed!\n";
        return $maxSpeed;
    } else {
        echo "Increasing ${oldSpeed}km/h to ${newSpeed}km/h\n";
        return $newSpeed;
    }
}

/**
 * Decelerates the car
 *
 * @param float $currentSpeed
 * @param float $decrease
 *
 */

function decelerate(float $currentSpeed, int $decrease): float
{
    $newSpeed = $currentSpeed - $decrease;
    if ($newSpeed < 0) {
        echo "Decreasing ${currentSpeed}km/h to 0km/h\n";
        return $currentSpeed;
    }

    echo "Decreasing ${currentSpeed}km/h to ${newSpeed}km/h\n";
    return $newSpeed;
}
