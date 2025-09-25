<?php

namespace Database\Seeders;

use App\Models\Review;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class ReviewSeeder extends Seeder
{
    public function run(): void
    {
        $reviews = [
            ['Alicia R.', 5, 'I felt completely at ease from the moment I walked in. The entire team is warm, efficient, and truly listens. My smile has never looked better.', 'Google'],
            ['Jordan P.', 5, 'Dr. Walton took time to explain every option for my veneer case. The results are so natural that everyone compliments my smile.', 'Google'],
            ['Michael B.', 4, 'Great hygienists and modern technology. The visit was quick and painless. Parking can be tight, so arrive a little early.', 'Yelp'],
            ['Priyanka S.', 5, 'The doctors are fantastic with kids. My daughter actually looks forward to her appointments now.', 'Google'],
            ['Ethan T.', 5, 'Had a dental emergency on a Saturday and they fit me in right away. The relief was immediate.', 'Google'],
            ['Sophia L.', 5, 'Beautiful office, kind staff, and the best whitening treatment I have ever tried. Highly recommend!', 'Google'],
            ['Carlos M.', 4, 'From scheduling to checkout everything was smooth. I appreciate the transparent pricing and treatment plans.', 'Yelp'],
            ['Amelia W.', 5, 'I am thrilled with my Invisalign® progress. The aligners are comfortable and the team tracks every detail.', 'Google'],
            ['Nina K.', 5, 'Hands down the most relaxing dental cleaning experience. They even offered a warm towel afterward.', 'Google'],
            ['Henry Q.', 5, 'Dr. Lee is so patient and caring. He helped me overcome my dental anxiety in just a few visits.', 'Healthgrades'],
            ['Mallory C.', 5, 'I trust Walton Family Dentistry with my entire family. They make preventative care easy and convenient.', 'Google'],
            ['James H.', 4, 'Top-notch technology and a great eye for aesthetics. The front desk follow-up could be faster but the care is excellent.', 'Yelp'],
            ['Laura V.', 5, 'My implant crown feels just like a natural tooth. I appreciate the thorough care and post-op check-ins.', 'Google'],
            ['Troy D.', 5, 'From the amenities to the friendly staff, this dental office feels more like a spa visit.', 'Google'],
            ['Valerie F.', 5, 'The dentists collaborate on your care plan which gave me so much confidence. Every detail is considered.', 'Google'],
            ['Dylan M.', 5, 'They helped with my insurance questions and made sure I understood coverage before treatment.', 'Google'],
            ['Rachel S.', 5, 'Fantastic pediatric experience. My son was all smiles thanks to the fun explanations and gentle care.', 'Google'],
            ['Ian L.', 4, 'Really good whitening results. I appreciated the custom trays and sensitivity tips.', 'Yelp'],
            ['Kimberly G.', 5, 'Every visit feels personalized. They remembered I prefer morning appointments and quiet music.', 'Google'],
            ['Olivia T.', 5, 'Clean, modern office with stellar infection control. I felt safe and well cared for.', 'Google'],
            ['Marcus R.', 5, 'Made the switch here for implant maintenance and I am so glad I did. The attention to detail is outstanding.', 'Google'],
            ['Summer N.', 5, 'Dr. Shah is the best! She has the most calming presence and explains everything clearly.', 'Google'],
            ['Greg H.', 5, 'Quick scheduling, friendly team, and a dental plan tailored to my goals. Excellent every time.', 'Google'],
            ['Whitney P.', 5, 'Love the focus on prevention and education. They empower you to keep your smile healthy between visits.', 'Google'],
        ];

        foreach ($reviews as $index => [$name, $rating, $body, $source]) {
            Review::updateOrCreate(
                [
                    'author_name' => $name,
                    'body' => $body,
                ],
                [
                    'rating' => $rating,
                    'source_label' => $source,
                    'source_url' => null,
                    'published_at' => Carbon::now()->subDays($index * 4 + 2),
                ],
            );
        }
    }
}
