<?php

namespace Database\Factories;

use App\Models\Doctor;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory<Doctor>
 */
class DoctorFactory extends Factory
{
    protected $model = Doctor::class;

    public function definition(): array
    {
        $name = $this->faker->name().' '.$this->faker->randomElement(['DDS', 'DMD']);

        return [
            'name' => $name,
            'slug' => Str::slug($name),
            'credentials' => $this->faker->sentence(8),
            'headshot_url' => 'https://images.unsplash.com/photo-1524504388940-b1c1722653e1?auto=format&fit=crop&w=960&q=80',
            'bio_markdown' => $this->faker->paragraphs(3, true),
            'specialties' => $this->faker->randomElements([
                'Preventive Care',
                'Cosmetic Dentistry',
                'Implant Dentistry',
                'Pediatric Dentistry',
                'Sedation Dentistry',
                'Emergency Care',
            ], 3),
            'social' => [
                'instagram' => 'https://instagram.com/'.$this->faker->userName(),
            ],
        ];
    }
}
