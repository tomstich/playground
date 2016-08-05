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
        return $oldSpeed;
    } else {
        echo "Increasing ${oldSpeed}km/h to ${newSpeed}km/h\n";
        return $newSpeed;
    }

}
