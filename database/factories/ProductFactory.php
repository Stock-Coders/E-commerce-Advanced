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
    public function definition()
    {
        return [
            'title'              => fake()->title(),
            'image'              => fake()->imageUrl,
            'description'        => fake()->sentence(24),
            'price'              => fake()->randomNumber(3 , true),
            'available_quantity' => fake()->randomNumber(2 , true),
            'category_id'        => fake()->numberBetween(1, 3),
            'sub_category_id'    => fake()->numberBetween(1, 3),
            'create_user_id'     => 1,
            'updated_at'         => null,
        ];
    }
}
