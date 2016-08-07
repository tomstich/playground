<?php

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
