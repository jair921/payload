<?php

namespace App\Http\Controllers;

use App\Domain\Payload\Actions\StorePayloadAction;
use App\Domain\Payload\DTO\PayloadData;
use App\Domain\Payload\Exceptions\StorePayloadException;
use App\Location;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response as ResponseCodes;
use Illuminate\Support\Facades\Response;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class PayloadController extends Controller
{
    public function index(Request $request): LengthAwarePaginator
    {
        return QueryBuilder::for(Location::class)
            ->allowedFilters([
                AllowedFilter::scope('created_at_between'),
            ])
            ->allowedSorts(['lat', 'lng', 'from', 'origin', 'address', 'created_at'])
            ->paginate(50);
    }

    public function store(Request $request, StorePayloadAction $storePayloadAction): JsonResponse
    {
        try {
            $created = $storePayloadAction->__invoke(PayloadData::fromRequest($request));
        }catch (StorePayloadException $storePayloadException){
            return Response::json(['message' => $storePayloadException->getMessage()], ResponseCodes::HTTP_UNPROCESSABLE_ENTITY);
        }

        return $created ? Response::json(['message' => trans('payload.store_success')], ResponseCodes::HTTP_CREATED)
        : Response::json(['message' => trans('payload.store_fail')], ResponseCodes::HTTP_UNPROCESSABLE_ENTITY);
    }
}
