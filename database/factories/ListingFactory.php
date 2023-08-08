<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class ListingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        //            $table->increments('listing_id');
        // $table->integer('price');
        // $table->integer('sqr_meters');
        // $table->enum('availability', ['Sale', 'Rent']);
        return [
            'price' => fake()->numberBetween(10,10000000),
            'sqr_meters' => fake()->numberBetween(20,10000),
            'availability' => fake()->randomElement(['Sale', 'Rent']),
        ];
    }

}
