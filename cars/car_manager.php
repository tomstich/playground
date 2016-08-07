<?php

function start(string $status): string
{
    return $status = 'running';
}

function stop(string $status): string
{
    return $status = 'parking';
}

function drive(float $aMileage, float $aCurrentSpeed, float $aMaxSpeed, float $aIncrease, float $aDistance): array
{
    $mileage = $aMileage + $aDistance;
    $currentSpeed = accelerate($aCurrentSpeed, $aIncrease, $aMaxSpeed);
    return [$mileage, $currentSpeed];
}

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

function accelerate($currentSpeed, $increase, $maxSpeed)
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

function decelerate($currentSpeed, $decrease)
{
    $newSpeed = $currentSpeed - $decrease;
    if ($newSpeed < 0) {
        echo "Decreasing ${currentSpeed}km/h to 0km/h\n";
        return 0;
    }

    echo "Decreasing ${currentSpeed}km/h to ${newSpeed}km/h\n";
    return $newSpeed;
}
