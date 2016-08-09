<?php

require 'car_manager.php';

$myCar = createCar('BMW');
$myCar = start($myCar);
$myCar = drive($myCar, 80, 200);
$myCar = drive($myCar, 80, 200);
$myCar = drive($myCar, -200, 200);
$myCar = stop($myCar);

$brands = ['BMW', 'Mercedes', 'VW', 'Audi', 'Renault', 'Tesla', 'Porsche'];

// Create the fleet
$fleet = [];
$fleetSize = 100;

for ($i=0; $i < $fleetSize; $i++) {

    $car = createCar($brands[rand(0, count($brands) - 1)]);
    $fleet[$car['identifier']] = $car;

}
exit;

// Start fleet
foreach ($fleet as $identifier => $car) {
    $fleet[$identifier] = start($car);
}

$allCarsDead = false;

while (!$allCarsDead) {

    $allCarsDead = true;

    foreach ($fleet as $identifier => $car) {
        $fleet[$identifier] = drive($car, 80, 100);
        if ($fleet[$identifier]['status'] !== 'broken') {
            $allCarsDead = false;
        }
    }
}
