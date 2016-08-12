<?php

namespace Jimdo\Car;

use Jimdo\Car;

interface AuthorizedDealer
{
    public function secretKey(Car $car, string $secretKey);

    public function resetMileage(Car $car);
}
