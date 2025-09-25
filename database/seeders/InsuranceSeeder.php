<?php

namespace Database\Seeders;

use App\Models\Insurance;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class InsuranceSeeder extends Seeder
{
    public function run(): void
    {
        $insurers = [
            'Delta Dental' => 'https://dummyimage.com/400x200/ffffff/000000&text=Delta+Dental',
            'MetLife' => 'https://dummyimage.com/400x200/ffffff/000000&text=MetLife',
            'Aetna' => 'https://dummyimage.com/400x200/ffffff/000000&text=Aetna',
            'Cigna' => 'https://dummyimage.com/400x200/ffffff/000000&text=Cigna',
            'Humana' => 'https://dummyimage.com/400x200/ffffff/000000&text=Humana',
            'Guardian' => 'https://dummyimage.com/400x200/ffffff/000000&text=Guardian',
            'United Concordia' => 'https://dummyimage.com/400x200/ffffff/000000&text=United+Concordia',
            'Blue Cross Blue Shield' => 'https://dummyimage.com/400x200/ffffff/000000&text=BCBS',
        ];

        foreach ($insurers as $name => $logo) {
            Insurance::updateOrCreate(
                ['name' => $name],
                [
                    'logo_url' => $logo,
                    'website_url' => 'https://'.Str::slug($name).'.com',
                    'notes' => 'Coverage varies by plan. We verify benefits before your visit.',
                ],
            );
        }
    }
}
