<?php

namespace Database\Factories;
use \App\Models\User;
use \App\Models\Picture;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\QuickAccess>
 */
class QuickAccessFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'slug' => $this->faker->sentence(),
            'title' => $this->faker->sentence(),
            'detail' => $this->faker->sentences(),
            'user_id' => User::factory(),
            'image_name' => $this->faker->sentence(),
            'image_path' => $this->faker->sentence()
            
        ];
    }
}
