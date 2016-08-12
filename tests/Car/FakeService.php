<?php

namespace Jimdo\Car;

class FakeService implements AuthorizedDealer
{
    public $secretKey;

    public $objectHash;

    public function secretKey(string $secretKey)
    {
        $this->secretKey = $secretKey;
    }
}
