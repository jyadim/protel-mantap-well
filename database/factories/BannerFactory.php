<?php
namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Picture;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Banner>
 */
class BannerFactory extends Factory
{
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(),  // Menggunakan sentence() untuk title
            'subtitle' => $this->faker->sentence(), // Menggunakan sentence() untuk subtitle
            'image_name' => $this->faker->sentence(),// Menghasilkan picture_id dari factory Picture
            'image_path' => $this->faker->sentence()// Menghasilkan picture_id dari factory Picture
        ];
    }
}
 