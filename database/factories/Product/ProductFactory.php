<?php

namespace Database\Factories\Product;

use App\Models\Product\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    protected $model = Product::class;

    public function definition()
    {
        $prices = [1500, 2000, 18000, 20000, 25000];

        return [
            'name' => $this->faker->name,
            'price' => $prices[array_rand($prices)],
            'count' => $this->faker->numberBetween(0, 30)
        ];
    }
}
