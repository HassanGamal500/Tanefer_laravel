<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class PaginatedCollection extends ResourceCollection
{
    private $resourceClass;

    public function __construct($resource, $resourceClass)
    {
        parent::__construct($resource);

        $this->resource = $this->collectResource($resource);
        $this->resourceClass = $resourceClass;
    }


    public function toArray($request)
    {
        return [
            'data' => $this->resourceClass::collection($this->collection),
            'per_page' => $this->resource->perPage(),
            'total' => $this->resource->total(),
            'current_url' => request()->url().'?'
                .http_build_query(request()->except('page')),
            'last_page'   => $this->resource->lastPage(),
            'current_page' => $this->resource->currentPage(),
        ];
    }
}
//($this->resource->appends(request()->except('page','per_page')))
//                ->url($this->resource->currentPage()),
