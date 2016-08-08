<?php
/**
 * Starts the car
 *
 * @param string $status
 *
 */

function start(string $status, float $mileAge, string $brand): string
{
    if ($status === 'running' || $status === 'driving') {
        echo "The car is already running!\n";
    } elseif ($mileAge > obsolescence($brand)) {
        echo "The obsolescence is reached!\n";
        return $status = 'parking';
    }

    return $status = 'running';
}

/**
 * Stops the car
 *
 * @param string $status
 *
 */

function stop(string $status, float $aCurrentSpeed): string
{
    if ($status === 'parking') {
        if ($aCurrentSpeed > 0) {
            echo "You can not turn off the car during driving!\n";
            return $status = 'driving';
        }
    }
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

function drive(float $aMileage, float $aCurrentSpeed, float $aMaxSpeed, float $aIncrease, float $aDistance, string $aStatus): array
{

    if ($aStatus === 'parking') {
        echo "The engine is not running!\n";
        return [$aMileage, $aCurrentSpeed, $aStatus];
    } else {
        $mileage = $aMileage + $aDistance;
        $status = $aStatus;

        if ($aIncrease > -1) {
            $newSpeed = $aCurrentSpeed + $aIncrease;

            if ($newSpeed > $aMaxSpeed) {
            echo "${newSpeed}km/h is higher than the allowed ${aMaxSpeed}km/h speed!\n";
            $status = 'driving';
            $newSpeed = $aMaxSpeed;
            } else {
            echo "Increasing ${aCurrentSpeed}km/h to ${newSpeed}km/h\n";
            $status = 'driving';
            }

        } else {
            $newSpeed = $aCurrentSpeed + $aIncrease;

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
}




/**
 * Obsolescence of a brand
 *
 * @param string $aBrand
 *
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
 *
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
 *
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
