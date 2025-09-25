<?php

namespace Database\Factories;

use App\Models\Review;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Review>
 */
class ReviewFactory extends Factory
{
    protected $model = Review::class;

    public function definition(): array
    {
        return [
            'author_name' => $this->faker->name(),
            'rating' => $this->faker->numberBetween(4, 5),
            'body' => $this->faker->paragraph(),
            'published_at' => $this->faker->dateTimeBetween('-2 years', 'now'),
            'source_label' => $this->faker->randomElement(['Google', 'Yelp', 'Healthgrades']),
            'source_url' => $this->faker->url(),
        ];
    }
}
