<?php

namespace App\Domain\Payload\Actions;

use App\Domain\Payload\DTO\PayloadData;
use App\Location;

class StorePayloadAction
{

    private PayloadToArrayAction $payloadToArrayAction;

    public function __construct(PayloadToArrayAction $payloadToArrayAction)
    {
        $this->payloadToArrayAction = $payloadToArrayAction;
    }

    public function __invoke(string  $data)
    {
        $location = $this->payloadToArrayAction->__invoke($data);

        return Location::create($location);
    }
}
