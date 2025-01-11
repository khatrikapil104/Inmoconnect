<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Property>
 */
class PropertyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'description' => fake()->text(),
            'category' => $this->getRandomValueFromArray(config('constant.CATEGORY_ARR')),
            'situation' => $this->getRandomValueFromArray(config('constant.SITUATION_ARR')),
            'property_type' => $this->getRandomValueFromArray(config('constant.PROPERTY_TYPE_ARR')),
            'reference' => fake()->text(20),
            'owner_name' => fake()->name(),
            'vendor_name' => fake()->name(),
            'vendor_phone' => fake()->phoneNumber(),
            'vendor_fax' => fake()->text(20),
            'vendor_mobile' => fake()->phoneNumber(),
            'vendor_email' => fake()->safeEmail(),
            'vendor_address' => fake()->text(50),
            
        ];
    }

    function getRandomValueFromArray($array) {
        // Get a random key from the array
        $randomKey = array_rand($array);
    
        // Return the corresponding value
        return $array[$randomKey];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
