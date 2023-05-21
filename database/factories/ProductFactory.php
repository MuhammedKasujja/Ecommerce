<?php

namespace Database\Factories;

use App\Models\Brand;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id' => function () {
                return User::factory()->create()->id;
            },
            'brand_id' => function () {
                return Brand::factory()->create()->id;
            },
            'min_qty' => $this->faker->numberBetween(),
            'published' => $this->faker->numberBetween(0, 1),
            'tax' => $this->faker->numberBetween(),
            'unit_price' => 'float',
            'status' => 'integer',
            'discount' => 'float',
            'current_stock' => 'integer',
            'free_shipping' => 'integer',
            'featured_status' => 'integer',
            'refundable' => 'integer',
            'featured' => 'integer',
            'flash_deal' => 'integer',
            'seller_id' => 'integer',
            'purchase_price' => 'float',
        ];
    }
}
