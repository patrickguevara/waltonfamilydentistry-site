<?php

namespace Database\Seeders;

use App\Models\Doctor;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DoctorSeeder extends Seeder
{
    public function run(): void
    {
        $doctors = [
            [
                'name' => 'Danelle Walton, DDS',
                'credentials' => 'Doctor of Dental Surgery, Indiana University School of Dentistry',
                'headshot_url' => 'https://images.unsplash.com/photo-1544723795-3fb6469f5b39?auto=format&fit=crop&w=960&q=80',
                'bio_markdown' => <<<'MD'
Dr. Walton founded Walton Family Dentistry to make high-level care comfortable and approachable for every patient. She is committed to continuing education in cosmetic and implant dentistry and serves on the board for the Austin Dental Society. Patients love her calming chairside manner and personalized treatment plans.
MD,
                'specialties' => ['Cosmetic Dentistry', 'Implant Restorations', 'Invisalign®'],
                'social' => [
                    'instagram' => 'https://instagram.com/dremilywalton',
                    'linkedin' => 'https://linkedin.com/in/dremilywalton',
                ],
            ],
            [
                'name' => 'Kyle Walton, DDS',
                'credentials' => 'Doctor of Dental Medicine, Indiana University School of Dentistry',
                'headshot_url' => 'https://images.unsplash.com/photo-1524504388940-b1c1722653e1?auto=format&fit=crop&w=960&q=80',
                'bio_markdown' => <<<'MD'
Dr. Lee focuses on preventive and family dentistry, helping patients build lasting habits that support lifelong oral health. He is certified in laser dentistry and has advanced training in pediatric behavior management. Outside the office, you’ll find him cycling the Hill Country trails.
MD,
                'specialties' => ['Preventive Care', 'Pediatric Dentistry', 'Laser Dentistry'],
                'social' => [
                    'facebook' => 'https://facebook.com/drmarcuslee',
                ],
            ],
        ];

        foreach ($doctors as $data) {
            Doctor::updateOrCreate(
                ['slug' => Str::slug($data['name'])],
                [
                    'name' => $data['name'],
                    'credentials' => $data['credentials'],
                    'headshot_url' => $data['headshot_url'],
                    'bio_markdown' => $data['bio_markdown'],
                    'specialties' => $data['specialties'],
                    'social' => $data['social'],
                ],
            );
        }
    }
}
