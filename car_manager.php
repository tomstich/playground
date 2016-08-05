<?php

/*
Wheels
Current speed
Max speed
Seats
Color
horsepower
status: driving, parking
brand
*/

$wheels = 4;
$currentSpeed = 0.0;
$maxSpeed = 220.0;
$seats = 5;
$color = 'black';
$horsepower = 110;
$status = 'parking';
$brand = 'BMW';

$currentSpeed = accelerate($currentSpeed, 50, $maxSpeed);
$currentSpeed = accelerate($currentSpeed, 50, $maxSpeed);
$currentSpeed = accelerate($currentSpeed, 50, $maxSpeed);
$currentSpeed = accelerate($currentSpeed, 50, $maxSpeed);
$currentSpeed = accelerate($currentSpeed, 50, $maxSpeed);
$currentSpeed = accelerate($currentSpeed, 50, $maxSpeed);

$currentSpeed = decelerate($currentSpeed, 50);
$currentSpeed = decelerate($currentSpeed, 50);
$currentSpeed = decelerate($currentSpeed, 50);
$currentSpeed = decelerate($currentSpeed, 50);
$currentSpeed = decelerate($currentSpeed, 50);
$currentSpeed = decelerate($currentSpeed, 50);


function getStatus($status)
{
    return $status;
}

function drive($status)
{
    return $status = 'driving';
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
