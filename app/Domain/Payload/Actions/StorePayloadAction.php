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

    public function __invoke(PayloadData  $payloadData)
    {
        $location = $this->payloadToArrayAction->__invoke($payloadData->data);

        return Location::create($location);
    }
}
