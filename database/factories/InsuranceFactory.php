<?php

namespace Database\Factories;

use App\Models\Insurance;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Insurance>
 */
class InsuranceFactory extends Factory
{
    protected $model = Insurance::class;

    public function definition(): array
    {
        $name = $this->faker->company();

        return [
            'name' => $name,
            'logo_url' => 'https://dummyimage.com/400x200/ffffff/000000&text='.urlencode($name),
            'website_url' => $this->faker->url(),
            'notes' => $this->faker->sentence(),
        ];
    }
}
