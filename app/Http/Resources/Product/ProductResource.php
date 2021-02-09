<?php

namespace App\Http\Resources\Product;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'name' => $this->name,
            'price' => $this->price,
            'count' => $this->count,
            'properties' => PropertyResource::collection($this->properties)
        ];
    }
}
