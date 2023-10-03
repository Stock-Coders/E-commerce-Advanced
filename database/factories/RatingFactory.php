<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Carbon\Carbon;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Rating>
 */
class RatingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            //
            'rating_level' => fake()->numberBetween(1, 5),
            'customer_id'  => 3,
            'product_id'   => fake()->numberBetween(1, 15),
            'created_at'   => Carbon::now()->toDateTimeString(),
        ];
    }
}
