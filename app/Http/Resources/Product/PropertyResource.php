<?php

namespace App\Http\Resources\Product;

use Illuminate\Http\Resources\Json\JsonResource;

class PropertyResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'name' => $this->name->name,
            'value' => $this->value->value
        ];
    }
}
