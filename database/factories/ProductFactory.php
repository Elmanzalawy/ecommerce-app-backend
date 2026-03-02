<?php

namespace Database\Factories;

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
    public function definition(): array
    {
        return [
            'name' => $this->faker->word(),
            'description' => $this->faker->sentence(),
            'price' => $price = $this->faker->numberBetween(500, 9000),
            'discount_price' => $this->faker->boolean(10) ? $this->faker->numberBetween(100, $price) : null,
            'currency' => $this->faker->currencyCode(),
            'stock' => $this->faker->numberBetween(0, 100),
            'is_active' => $this->faker->boolean(),
            'images' => $this->faker->randomElements([
                $this->faker->imageUrl(),
                $this->faker->imageUrl(),
                $this->faker->imageUrl(),
            ], 3),
        ];
    }
}
