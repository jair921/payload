<?php


namespace App\Domain\Payload\Actions;


use App\Domain\Payload\DTO\PayloadData;

class LoadPayloadAction
{

    private StorePayloadAction $storePayloadAction;

    public function __construct(StorePayloadAction $storePayloadAction)
    {
        $this->storePayloadAction = $storePayloadAction;
    }

    /**
     * @param PayloadData $payloadData
     * @return bool
     */
    public function __invoke(PayloadData  $payloadData): bool
    {
        //If save one location
        if(!$payloadData->isMassiveSave()){
            return $this->storePayloadAction->__invoke($payloadData->data);
        }

        //If save multiple locations
        $saveAll = true;
        $payloadData->getListData()->each(function($location, $key) use($saveAll) {
            if(!app(StorePayloadAction::class)->__invoke($location)){
                $saveAll = false;
            }
        });

        return $saveAll;
    }
}
