<?php

namespace Database\Factories\Product;

use App\Models\Product\PropertyValue;
use Illuminate\Database\Eloquent\Factories\Factory;

class PropertyValueFactory extends Factory
{
    protected $model = PropertyValue::class;

    public function definition()
    {
        return [
          'value' => $this->faker->colorName
        ];
    }
}
