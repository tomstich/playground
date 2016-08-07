<?php

require 'car_manager.php';

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
