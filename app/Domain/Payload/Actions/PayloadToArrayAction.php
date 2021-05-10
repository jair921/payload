<?php

namespace App\Domain\Payload\Actions;

use App\Domain\Payload\Exceptions\StorePayloadException;
use ErrorException;
use ParseError;

class PayloadToArrayAction
{
    public function __invoke(string $data)
    {
        $result = [];
        try{
            $str = hex2bin(str_replace(["\n", "\r"], '', $data));
            eval(("\$result = [".$str."];"));
        }catch (ErrorException $errorException){
            throw StorePayloadException::hexFailDecode($errorException->getMessage());
        } catch (ParseError $parseError){
            throw StorePayloadException::evalFailDecode($parseError->getMessage());
        }

        return $result;
    }
}
