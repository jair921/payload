<?php

namespace App\Domain\Payload\Actions;

class PayloadToArrayAction
{
    public function __invoke(string $data)
    {
        $result = [];
        $str = hex2bin(str_replace(["\n", "\r"], '', $data));

        eval(("\$result = [".$str."];"));

        return $result;
    }
}
