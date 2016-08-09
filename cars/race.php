<?php

require 'car_manager.php';

$brands = ['BMW', 'Mercedes', 'VW', 'Audi', 'Renault', 'Tesla', 'Porsche'];

// Create the fleet
$fleet = [];
$fleetSize = 1000;

for ($i=0; $i < $fleetSize; $i++) {
    $car = createCar($brands[rand(0, count($brands) - 1)]);
    $fleet[$car['identifier']] = $car;

}

// Start fleet
foreach ($fleet as $identifier => $car) {
    $fleet[$identifier] = start($car);
}
//var_dump($fleet);

$allCarsDead = false;

$outerCount = 0;
$innerCount = 0;
while (!$allCarsDead) {

    $allCarsDead = true;

    foreach ($fleet as $identifier => $car) {
        if ($car['status'] === 'broken') {
            continue;
        }

        $fleet[$identifier] = drive($car, 80, 100);
        if ($fleet[$identifier]['status'] !== 'broken') {
            $allCarsDead = false;
        }

        $innerCount++;
    }

    $outerCount++;
}

printf("Size of fleet: %d Loop outer count: %d Loop inner count: %d\n"
    , $fleetSize
    , $outerCount
    , $innerCount
);
