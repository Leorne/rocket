<?php

namespace App\Http\Filter\Product;

class MultipleFilterDto
{
    public array $properties;

    public function __construct($properties)
    {
        $this->properties = $properties ?? [];
    }
}
