<?php

namespace Database\Factories;

use App\Models\Service;
use App\Models\ServiceFaq;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<ServiceFaq>
 */
class ServiceFaqFactory extends Factory
{
    protected $model = ServiceFaq::class;

    public function definition(): array
    {
        return [
            'service_id' => Service::factory(),
            'question' => 'What is '.$this->faker->word().'?',
            'answer' => $this->faker->paragraph(),
            'display_order' => $this->faker->numberBetween(1, 5),
        ];
    }
}
