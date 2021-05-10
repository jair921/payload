<?php

namespace App\Domain\Payload\DTO;

use Illuminate\Http\Request;
use Spatie\DataTransferObject\DataTransferObject;

class PayloadData extends  DataTransferObject
{
    public ?string $data;

    public ?array $dataList;

    public static function fromRequest(Request $request): self
    {
        $data = self::getData($request);

        return new static(['data' => $data]);
    }

    private static function getData(Request $request)
    {
        $paramName = config('payload.param_name');

        if(is_null($paramName))
        {
            return file_get_contents('php://input');
        }

        return $request->$paramName;
    }
}
