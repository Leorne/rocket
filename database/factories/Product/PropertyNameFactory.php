<?php

namespace Database\Factories\Product;

use App\Models\Product\PropertyName;
use Illuminate\Database\Eloquent\Factories\Factory;

class PropertyNameFactory extends Factory
{
    protected $model = PropertyName::class;

    public function definition()
    {
        return [
            'name' => $this->faker->word
        ];
    }
}
