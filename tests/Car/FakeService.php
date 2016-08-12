<?php

namespace Jimdo\Car;

use Jimdo\Car;

class FakeService implements AuthorizedDealer
{
    public $secretKey;

    public $objectHash;

    public function secretKey(Car $car, string $secretKey)
    {
        $this->secretKey = $secretKey;
    }

    public function resetMileage(Car $car)
    {

    }
}
