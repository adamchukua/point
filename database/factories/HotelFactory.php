<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Hotel>
 */
class HotelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id' => 1,
            'name' => $this->faker->sentence,
            'type' => 'hotel',
            'address' => $this->faker->sentence,
            'city' => 289,
            'description' => $this->faker->text,
            'food_with_own_kitchen' => $this->faker->numberBetween(0, 1),
            'food_breakfast_is_included' => $this->faker->numberBetween(0, 1),
            'food_restaurant' => $this->faker->numberBetween(0, 1),
            'internet_free_wifi' => $this->faker->numberBetween(0, 1),
            'internet_fixed' => $this->faker->numberBetween(0, 1),
            'transport_free_parking' => $this->faker->numberBetween(0, 1),
            'transport_paid_parking' => $this->faker->numberBetween(0, 1),
            'transport_e_station' => $this->faker->numberBetween(0, 1),
            'sports_leisure_fitness' => $this->faker->numberBetween(0, 1),
            'sports_leisure_basin' => $this->faker->numberBetween(0, 1),
            'sports_leisure_health_spa' => $this->faker->numberBetween(0, 1),
            'other_pets_allowed' => $this->faker->numberBetween(0, 1),
            'other_cleaning' => $this->faker->numberBetween(0, 1),
            'other_facilities_for_people_with_disabilities' => $this->faker->numberBetween(0, 1),
        ];
    }
}
