<?php

namespace Database\Seeders;

use App\Models\Product\Product;
use App\Models\Product\Property;
use App\Models\Product\PropertyName;
use App\Models\Product\PropertyValue;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $products = Product::factory()->count(80)->create();

        $colors = ['red', 'blue', 'yellow', 'green', 'gray', 'black', 'white'];
        foreach ($colors as $color){
            $propertyValues[] = PropertyValue::factory()->create([
                'value' => $color
            ]);
        }

        $names = ['main_color', 'second_color', 'additional_color'];
        foreach ($names as $name){
            $propertyNames[] = PropertyName::factory()->create([
               'name' => $name
            ]);
        }

        $products->each(function ($product) use ($propertyNames, $propertyValues){
            $propertyName = $propertyNames[array_rand($propertyNames)];
            $propertyValue = $propertyValues[array_rand($propertyValues)];

            $property = Property::factory()->create(
                [
                    'product_id' => $product->id,
                    'value_id' => $propertyValue->id,
                    'name_id' => $propertyName->id,
                ]
            );
        });
    }
}
