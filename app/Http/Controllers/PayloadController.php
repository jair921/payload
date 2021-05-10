<?php

namespace App\Http\Controllers;

use App\Domain\Payload\Actions\StorePayloadAction;
use App\Location;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class PayloadController extends Controller
{

    public function index(Request $request)
    {
        $locations = QueryBuilder::for(Location::class)
            ->allowedFilters([
                AllowedFilter::scope('created_at_between'),
            ])
            ->allowedSorts(['lat', 'lng', 'from', 'origin', 'address', 'created_at'])
            ->paginate(50);

        return $locations;
    }

    public function store(Request $request, StorePayloadAction $storePayloadAction)
    {
       $data = file_get_contents('php://input');

        return ($storePayloadAction)($data);
    }
}
