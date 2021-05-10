<?php

namespace App\Domain\Payload\Actions;

use App\Location;

class StorePayloadAction
{

    private PayloadToArrayAction $payloadToArrayAction;

    public function __construct(PayloadToArrayAction $payloadToArrayAction)
    {
        $this->payloadToArrayAction = $payloadToArrayAction;
    }

    public function __invoke($data)
    {
        $location = ($this->payloadToArrayAction)($data);

        return Location::create($location);
    }
}
