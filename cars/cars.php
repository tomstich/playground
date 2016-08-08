<?php

require 'car_manager.php';

// A shiny nice BMW
$currentSpeed = 0.0;
$maxSpeed = 220.0;
$status = 'parking';
$brand = 'BMW';
$mileage = 0.0;
$plannedObsolescence = obsolescence($brand);
debug($brand, $currentSpeed, $status, $mileage);

// Start the car
$status = start($status);
debug($brand, $currentSpeed, $status, $mileage);

// Drive some kilometers
list($mileage, $currentSpeed) = drive($mileage, $currentSpeed, $maxSpeed, 50, 100);
debug($brand, $currentSpeed, $status, $mileage);

// Drive some more kilometers
list($mileage, $currentSpeed) = drive($mileage, $currentSpeed, $maxSpeed, 80, 600);
debug($brand, $currentSpeed, $status, $mileage);

// There's a red light! Halt the car!
echo "There's a red light ahead! Slowing down...\n";
list($mileage, $currentSpeed) = drive($mileage, $currentSpeed, $maxSpeed, -130, 600);
debug($brand, $currentSpeed, $status, $mileage);

// Stop the car
$status = stop($status);
debug($brand, $currentSpeed, $status, $mileage);

// Start the car again again
$status = start($status);
debug($brand, $currentSpeed, $status, $mileage);

// Drive the car to death
list($mileage, $currentSpeed) = drive($mileage, $currentSpeed, $maxSpeed, 80, 3700.1);
debug($brand, $currentSpeed, $status, $mileage);

/**
 * Outputs debug information
 *
 * @param string $brand
 * @param float  $currentSpeed
 * @param string $status
 * @param float  $mileage
 */
function debug(string $brand, float $currentSpeed, string $status, float $mileage)
{
    printf("Brand: %-8s\tCurrent speed: %-8.2f\tStatus: %-8s\tMileage: %-8f\n"
        , $brand
        , $currentSpeed
        , $status
        , $mileage
    );
}

var_dump(obsolescence(13));
