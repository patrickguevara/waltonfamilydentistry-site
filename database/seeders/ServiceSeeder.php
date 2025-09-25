<?php

namespace Database\Seeders;

use App\Models\Service;
use App\Models\ServiceFaq;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ServiceSeeder extends Seeder
{
    public function run(): void
    {
        $services = [
            [
                'title' => 'Cleanings & Exams',
                'excerpt' => 'Preventive visits designed to keep your smile healthy and comfortable for the long run.',
                'hero_image_url' => 'https://images.unsplash.com/photo-1527613426441-4da17471b66d?auto=format&fit=crop&w=1792&q=80',
                'body_markdown' => <<<'MD'
## Comprehensive preventive care

Routine cleanings and exams help us catch concerns while they’re small and provide the deep clean your smile deserves. Expect a gentle touch, digital x-rays when needed, and a personalized plan for keeping your teeth and gums healthy.

### What to expect

- Comfortable, spa-like operatories
- Cavity detection with modern imaging
- Personalized home care guidance
MD,
                'faqs' => [
                    ['How often should I schedule a cleaning?', 'Most patients benefit from a visit every six months, though we may tailor the cadence to your unique needs.'],
                    ['Will my cleaning be painful?', 'Our hygienists use modern tools and a gentle approach. We’ll check in often and adjust if you feel any discomfort.'],
                ],
            ],
            [
                'title' => 'Cosmetic Dentistry',
                'excerpt' => 'Enhance your natural smile with treatments that balance aesthetics and oral health.',
                'hero_image_url' => 'https://images.unsplash.com/photo-1515378791036-0648a3ef77b2?auto=format&fit=crop&w=1792&q=80',
                'body_markdown' => <<<'MD'
## Confidence starts with a smile

Cosmetic dentistry at Walton Family Dentistry is designed around you. Together we can brighten, reshape, and refine your smile with conservative, high-impact treatments.

### Popular options

- Professional whitening
- Bonding and tooth recontouring
- Veneers tailored to your features
MD,
                'faqs' => [
                    ['Are cosmetic consultations complimentary?', 'Yes. We’ll review your goals, take photos, and recommend options that match your timeline and budget.'],
                    ['How long do veneers last?', 'With great home care and routine visits, porcelain veneers often last 10–15 years or longer.'],
                ],
            ],
            [
                'title' => 'Invisalign®',
                'excerpt' => 'Clear aligner therapy that straightens discreetly with predictable results.',
                'hero_image_url' => 'https://images.unsplash.com/photo-1609840113929-b130355987e1?q=80&w=3870&auto=format&fit=crop&w=1792&q=80',
                'body_markdown' => <<<'MD'
## Modern orthodontics without brackets

Invisalign® aligners fit seamlessly into your routine. We map each step digitally so you can preview your new smile before treatment even begins.

### Why patients choose Invisalign®

- Nearly invisible aligners
- Eat what you love by removing trays
- Fewer in-office visits than braces
MD,
                'faqs' => [
                    ['How long does treatment take?', 'Most cases finish in 9–18 months depending on complexity. We’ll review a personalized timeline during your consultation.'],
                    ['Is Invisalign® right for teens?', 'Yes—Invisalign® Teen includes compliance indicators and replacement aligners for peace of mind.'],
                ],
            ],
            [
                'title' => 'Dental Implants',
                'excerpt' => 'Permanent tooth replacement that functions and looks like the real thing.',
                'hero_image_url' => 'https://images.unsplash.com/photo-1548382131-e0ebb1f0cdea?q=80&w=2564&auto=format&fit=crop&w=1792&q=80',
                'body_markdown' => <<<'MD'
## Restore confidence and function

Implants integrate with your jawbone to provide a secure foundation for crowns, bridges, or dentures. We collaborate with trusted specialists for surgical placement and complete the final restorations in office.

### Benefits of implants

- Prevent bone loss after extraction
- Strong, stable bite
- Natural aesthetics customized to you
MD,
                'faqs' => [
                    ['Who is a candidate for implants?', 'Most healthy adults qualify. We evaluate bone density and overall health to confirm.'],
                    ['How do I care for implants?', 'Treat them like natural teeth—brush twice daily, floss, and keep up with professional cleanings.'],
                ],
            ],
            [
                'title' => 'Crowns & Bridges',
                'excerpt' => 'Durable restorations crafted to blend seamlessly with your natural teeth.',
                'hero_image_url' => 'https://images.unsplash.com/photo-1617812191081-2a24e3f30e45?q=80&w=2187&auto=format&fit=crop&w=1792&q=80',
                'body_markdown' => <<<'MD'
## Strengthen and restore

Custom crowns and bridges protect compromised teeth and close gaps with lifelike ceramics. Our digital impressions mean no goopy trays and faster turnaround times.
MD,
                'faqs' => [
                    ['How long do crowns last?', 'With good care, most crowns last 10–15 years or longer.'],
                    ['Will insurance help?', 'Many plans cover a portion of the cost. We’ll verify your benefits ahead of treatment.'],
                ],
            ],
            [
                'title' => 'Root Canals',
                'excerpt' => 'Gentle endodontic therapy that relieves pain and saves your natural tooth.',
                'hero_image_url' => 'https://images.unsplash.com/photo-1625019030820-e4ed970a6c95?q=80&w=2000&auto=format&fit=crop&w=1792&q=80',
                'body_markdown' => <<<'MD'
## Relief is on the way

Modern root canal therapy is comfortable and efficient. We remove the infected pulp, disinfect the canal, and seal the tooth to prevent reinfection.
MD,
                'faqs' => [
                    ['Will I feel pain during the procedure?', 'We thoroughly numb the area and offer comforts to keep you relaxed. Most patients feel immediate relief.'],
                    ['Do I need a crown afterward?', 'Many teeth do, especially molars, to reinforce strength after treatment.'],
                ],
            ],
            [
                'title' => 'Emergency Dentistry',
                'excerpt' => 'Same-day care for toothaches, injuries, and urgent concerns.',
                'hero_image_url' => 'https://images.unsplash.com/photo-1511766443616-f41c8cadf015?q=80&w=3948&auto=format&fit=crop&w=1792&q=80',
                'body_markdown' => <<<'MD'
## We’re here when you need us

Dental emergencies can’t wait. Call us and we’ll walk you through next steps, provide pain relief, and reserve time for you the same day whenever possible.
MD,
                'faqs' => [
                    ['What counts as a dental emergency?', 'Severe pain, swelling, broken teeth, infections, or anything that feels urgent to you. When in doubt, call us.'],
                    ['Do you accept patients who are new to the practice?', 'Absolutely. We keep room in our schedule for urgent visits.'],
                ],
            ],
            [
                'title' => 'Professional Whitening',
                'excerpt' => 'Lift stains safely with quick in-office or take-home whitening solutions.',
                'hero_image_url' => 'https://images.unsplash.com/photo-1489278353717-f64c6ee8a4d2?auto=format&fit=crop&w=1792&q=80',
                'body_markdown' => <<<'MD'
## Brighten on your timeline

Choose same-day in-office brightening or custom trays you can wear at home. Either way, you get professional-grade results with minimal sensitivity.
MD,
                'faqs' => [
                    ['Will whitening make my teeth sensitive?', 'We tailor the formula and timing to minimize sensitivity and provide desensitizing gel when needed.'],
                    ['How long do results last?', 'With mindful habits and touch-up kits, your brighter smile can last 12–24 months.'],
                ],
            ],
            [
                'title' => 'Veneers',
                'excerpt' => 'Hand-crafted porcelain shells that transform shape, shade, and symmetry.',
                'hero_image_url' => 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?q=80&w=2187&auto=format&fit=crop&w=1792&q=80',
                'body_markdown' => <<<'MD'
## Customized artistry

We design veneers to complement your facial features and goals, focusing on natural beauty rather than a cookie-cutter look.
MD,
                'faqs' => [
                    ['How many veneers will I need?', 'We evaluate your smile line and discuss whether a single tooth or a broader transformation makes sense.'],
                    ['What is the process?', 'Plan on two visits after your consultation—one for preparation and temporaries, and one for placement.'],
                ],
            ],
            [
                'title' => 'Pediatric Dentistry',
                'excerpt' => 'Kid-friendly visits that build confidence and lifelong habits.',
                'hero_image_url' => 'https://images.unsplash.com/photo-1593183230686-69876b0cb240?q=80&w=2015&auto=format&fit=crop&w=1792&q=80',
                'body_markdown' => <<<'MD'
## Positive experiences from the start

We meet kids where they are with upbeat visits, cavity prevention, and guidance for parents. Expect an inviting atmosphere with tell-show-do explanations.
MD,
                'faqs' => [
                    ['When should my child see a dentist?', 'We follow the “first tooth or first birthday” rule to ensure healthy development.'],
                    ['Do you offer fluoride treatments?', 'Yes, along with sealants and nutritional counseling to keep little smiles cavity-free.'],
                ],
            ],
        ];

        foreach ($services as $index => $data) {
            $service = Service::updateOrCreate(
                ['slug' => Str::slug($data['title'])],
                [
                    'title' => $data['title'],
                    'excerpt' => $data['excerpt'],
                    'hero_image_url' => $data['hero_image_url'],
                    'body_markdown' => $data['body_markdown'],
                    'display_order' => $index + 1,
                ],
            );

            $service->faqs()->delete();
            foreach ($data['faqs'] as $order => $faq) {
                ServiceFaq::create([
                    'service_id' => $service->id,
                    'question' => $faq[0],
                    'answer' => $faq[1],
                    'display_order' => $order + 1,
                ]);
            }
        }
    }
}
